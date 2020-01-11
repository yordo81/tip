<?php

namespace App\Controller;

use App\Entity\CtrlMov;
use App\Entity\Employees;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;

class CtrlMovController extends AbstractController
{
    /**
     * @Route("/ctrlmov/", name="show_ctrl_mov")
     */
    public function index($currentPage = 1)
    {
        $startDate = new \DateTime('first day of this month midnight');
        $endDate = new \DateTime('last day of this month');
        //$crtlmovs = $this->getDoctrine()->getRepository
        //(CtrlMov::class)->findAll();
        $crtlmovs = $this->getDoctrine()->getRepository
        (CtrlMov::class)->getIndexMonth($startDate, $endDate);
 
        return $this->render('/ctrlmov/index.html.twig', array
        ('ctrlmovs' => $crtlmovs));
    }

    /**
     * @Route("/ctrlmov/new", name="new_amount")
     * Method({"GET", "POST"})
     */
    public function new(Request $request)
    {
        $ctrlmovs = new CtrlMov();
        
        $formBuilder = $this->createFormBuilder($ctrlmovs)
        ->add('amount', MoneyType::class, array(
        'scale' => 2,
		'required' => 'true',
         'attr' =>array('class' => 'form-control'), 'label' => 'Propina'))
         ->add('description', TextAreaType::class, 
         array('attr' =>
         array('class' => 'form-control'), 'label' => 'Descripción'))
        ->add('employee', EntityType::class, array(
            'class' => Employees::class,
            'attr' => array('class' => 'form-control'), 'label' => 'Empleado'))
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

            return $this->redirectToRoute('show_ctrl_mov');
        }

        return $this->render('/ctrlmov/new.html.twig', array(
            'form' => $form->createView()
        ));


    }

    /**
     * @Route("/ctrlmov/edit/{id}", name="edit_amount")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id)
    {
        $ctrlmovs = new CtrlMov();
        $ctrlmovs = $this->getDoctrine()->getRepository
        (CtrlMov::class)->find($id);
        
        $formBuilder = $this->createFormBuilder($ctrlmovs)
        ->add('amount', MoneyType::class, array(
            'scale' => 2,
            'required' => 'true',
            'attr' =>array('class' => 'form-control'), 'label' => 'Propina'))
        ->add('description', TextAreaType::class, array('attr' =>
         array('class' => 'form-control'),
         'label' => 'Descripción'))
        ->add('employee', EntityType::class, array(
            'class' => Employees::class,
            'attr' => array('class' => 'form-control'), 'label' => 'Trabajador'))
        ->add('save', SubmitType::class, array(
           'label' => 'Actualizar',
           'attr' => array('class' => 'btn btn-primary mt-3')));
        $ctrlmovs->setDate(new \DateTime);
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $ctrlmovs = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('show_ctrl_mov');
        }

        return $this->render('/ctrlmov/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/ctrlmov/delete/{id}")
     * Method({"DELETE"})
     */
    public function delete(Request $request, $id)
    {
        $ctrlmovs = $this->getDoctrine()->getRepository
        (CtrlMov::class)->find($id);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($ctrlmovs);
        $entityManager->flush();

        return $this->redirectToRoute('show_ctrl_mov');
    }
	
	/**
	*@Route("/ctrlmov/details/{id}")
	*
	*/
	public function details(Request $request, $id)
	{
		$crtlmovs = $this->getDoctrine()->getRepository
        (CtrlMov::class)->find($id);
 
        return $this->render('/ctrlmov/details.html.twig', array
        ('ctrlmovs' => $crtlmovs));
    }

    /**
	*@Route("/ctrlmov/data")
	*
	*/
    
    public function getJson()
    {
        $startDate = new \DateTime('First Day of January');
        $endDate = new \DateTime('Last Day of December');
        $query = $this->getDoctrine()->getRepository(CtrlMov::class)->getSum($startDate, $endDate);
        
        $response = new Response();
        
        $response->headers->set('Content-Type', 'application/json');

        return $response->setContent(json_encode($query));

    }

    /**
     * @Route("ctrlmov/chart")
     * 
     */
    public function getChartView()
    {
        return $this->render('/ctrlmov/chart.html.twig');
    }
}
