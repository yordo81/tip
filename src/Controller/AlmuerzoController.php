<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Entity\Almuerzos;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class AlmuerzoController extends AbstractController
{
    /**
     * @Route("/almuerzo/", name="show_almuerzo")
     */
    public function index()
    {
        $user = $this->getUser();
        if ($user->hasRole('ROLE_ADMIN') or $user->hasRole('ROLE_COMERCIAL'))
        {
            $data = $this->getDoctrine()->getRepository
            (Almuerzos::class)->findAll();
            return $this->render('almuerzo/index.html.twig', array('data' => $data));
        }
        else {
            return $this->redirectToRoute('show_departments');
        }
        
    }

    /**
     * @Route("/almuerzo/new", name="new_almuerzo")
     * Method({"GET", "POST"})
     */
    public function new(Request $request)
    {
        $data = new Almuerzos();
        
        $formBuilder = $this->createFormBuilder($data)
        ->add('pax', IntegerType::class, array(
		'required' => 'true',
         'attr' =>array('class' => 'form-control'), 'label' => 'Cantidad de pax:'))
         ->add('descripcion', TextAreaType::class, 
         array('attr' =>
         array('class' => 'form-control'), 'label' => 'Descripción'))
        ->add('Hotel', EntityType::class, array(
            'class' => Hotel::class,
            'attr' => array('class' => 'form-control'), 'label' => 'Hotel'))
        ->add('date', DateTimeType::Class, array(
            'attr' => array('class' => 'form-control input-group date'),
            'date_widget' => 'single_text',
            "format" => 'yyyy-MM-dd',
            "data" => new \DateTime(),
            'required' => 'true',
            'label' => 'Fecha'))
        ->add('save', SubmitType::class, array(
           'label' => 'Crear',
           'attr' => array('class' => 'btn btn-primary mt-3')));
        //$ctrlmovs->setDate(new \DateTime);
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $ctrlmovs = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ctrlmovs);
            $entityManager->flush();

            return $this->redirectToRoute('show_almuerzo');
        }

        return $this->render('/almuerzo/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/almuerzo/edit/{id}", name="edit_almuerzo")
     * Method({"GET", "POST"})
     */
     public function edit(Request $request, $id)
     {
        $data = new Almuerzos();
        $data = $this->getDoctrine()->getRepository
        (Almuerzos::class)->find($id);

        $formBuilder = $this->createFormBuilder($data)
        ->add('pax', IntegerType::class, array(
		'required' => 'true',
         'attr' =>array('class' => 'form-control'), 'label' => 'Cantidad de pax:'))
         ->add('descripcion', TextAreaType::class, 
         array('attr' =>
         array('class' => 'form-control'), 'label' => 'Descripción'))
        ->add('Hotel', EntityType::class, array(
            'class' => Hotel::class,
            'attr' => array('class' => 'form-control'), 'label' => 'Hotel'))
        ->add('date', DateTimeType::Class, array(
            'attr' => array('class' => 'form-control input-group date'),
            'date_widget' => 'single_text',
            "format" => 'yyyy-MM-dd',
            "data" => new \DateTime(),
            'required' => 'true',
            'label' => 'Fecha'))
        ->add('save', SubmitType::class, array(
           'label' => 'Guardar',
           'attr' => array('class' => 'btn btn-primary mt-3')));
        //$ctrlmovs->setDate(new \DateTime);
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $ctrlmovs = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ctrlmovs);
            $entityManager->flush();

            return $this->redirectToRoute('show_almuerzo');
        }

        return $this->render('/almuerzo/edit.html.twig', array(
            'form' => $form->createView()
        ));

     }

     /**
     * @Route("/almuerzo/delete/{id}")
     * Method({"DELETE"})
     */
    public function delete(Request $request, $id)
    {
        $data = $this->getDoctrine()->getRepository
        (Almuerzos::class)->find($id);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($data);
        $entityManager->flush();

        return $this->redirectToRoute('show_almuerzo');
    }

    /**
	*@Route("/almuerzo/data")
	*
	*/
    public function getJson()
    {
        $startDate = new \DateTime('First Day of January');
        $endDate = new \DateTime('Last Day of December');
        $query = $this->getDoctrine()->getRepository(Almuerzos::class)->getSum($startDate, $endDate);
        
        $response = new Response();
        
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($query));

    }

    /**
     * @Route("almuerzo/chart")
     * 
     */
    public function getChartView()
    {
        return $this->render('/almuerzo/chart.html.twig');
    }

    

}
