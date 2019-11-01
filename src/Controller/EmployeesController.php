<?php

namespace App\Controller;

use App\Entity\Departments;
use App\Entity\Employees;
use App\Entity\CtrlMov;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class EmployeesController extends AbstractController
{
    /**
     * @Route("/employees/", name="show_employees")
     */
    public function index()
    {
        $employees = $this->getDoctrine()->getRepository
        (Employees::class)->findAll();
 
        return $this->render('/employees/index.html.twig', array
        ('employees' => $employees));
    }

    /**
     * @Route("/employees/new", name="new_employees")
     * Method({"GET", "POST"})
     */
    public function new(Request $request)
    {
        $employees = new Employees();
        
        $formBuilder = $this->createFormBuilder($employees)
        ->add('name', TextType::class, array('required' => 'false',
         'attr' =>array('class' => 'form-control')))
         ->add('lasname', TextType::class, array('attr' =>
         array('class' => 'form-control'),
         'label' => 'Last Name'))
        ->add('department', EntityType::class, array(
            'class' => Departments::class,
            'attr' => array(
                'class' => 'form-control'
            )))
        ->add('save', SubmitType::class, array(
           'label' => 'Create',
           'attr' => array('class' => 'btn btn-primary mt-3')));
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $employees = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($employees);
            $entityManager->flush();

            return $this->redirectToRoute('show_employees');
        }

        return $this->render('employees/new.html.twig', array(
            'form' => $form->createView()
        ));


    }

    /**
     * @Route("/employees/edit/{id}")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id)
    {
        $employees = new Employees();
        $employees = $this->getDoctrine()->getRepository
        (Employees::class)->find($id);
        $formBuilder = $this->createFormBuilder($employees)
        ->add('name', TextType::class, array('required' => 'false',
         'attr' =>array('class' => 'form-control')))
         ->add('lasname', TextType::class, array('attr' =>
         array('class' => 'form-control'),
         'label' => 'Last Name'))
        ->add('department', EntityType::class, array(
            'class' => Departments::class,
            'attr' => array(
                'class' => 'form-control'
            )))
        ->add('save', SubmitType::class, array(
           'label' => 'Update',
           'attr' => array('class' => 'btn btn-primary mt-3')));
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $employees = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('show_employees');
        }

        return $this->render('employees/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }




    /**
     * @Route("/employees/delete/{id}")
     * Method({"DELETE"})
     */
    public function delete(Request $request, $id)
    {
        $employees = $this->getDoctrine()->getRepository
        (Employees::class)->find($id);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($employees);
        $entityManager->flush();

        return $this->redirectToRoute('show_employees');
    }
	
	/**
     * @Route("/employees/details/{id}")
     */
	public function details($id)
	{
		$crtlmovs = $this->getDoctrine()->getRepository
        (CtrlMov::class)->findBy(array('employee' => $id), array('date' => 'DESC'));
        $employees = $this->getDoctrine()->getRepository
        (Employees::class)->find($id);

        $query = $this->getDoctrine()->getRepository(CtrlMov::class)->getSumAmount($id);
        //var_dump($query);die;
        
        return $this->render('/employees/details.html.twig', 
        array('ctrlmovs' => $crtlmovs, 'employees' => $employees, 'query' => $query));
    }
    
    /**
     * @Route("/employees/byDay")
     */
    public function byDay()
    {
        $startDate = \DateTime::createFromFormat( "Y-m-d H:i:s", date("Y-m-d 00:00:00"));
        $endDate = \DateTime::createFromFormat( "Y-m-d H:i:s", date("Y-m-d 23:59:59"));
        $query = $this->getDoctrine()->getRepository(Employees::class)->getSum($startDate, $endDate);
        
        return $this->render('/employees/byDay.html.twig', array('query' => $query));
    }

     /**
     * @Route("/employees/byMonth")
     */
    public function byMonth()
    {
        $startDate = new \DateTime('First Day of this Month');
        $endDate = new \DateTime('Last Day of this Month');
        $query = $this->getDoctrine()->getRepository(Employees::class)->getSum($startDate, $endDate);
        $departments = $this->getDoctrine()->getRepository(Departments::class)->findAll();
        //var_dump($query);
        return $this->render('/employees/byMonth.html.twig', array('query' => $query, 'department' => $departments));
    }

    /**
    * @Route("/employees/byMonthByDep/{id}")
    */
    public function byMonthByDep($id)
    {

        $startDate = new \DateTime('First Day of this Month');
        $endDate = new \DateTime('Last Day of this Month');
        $query = $this->getDoctrine()->getRepository(Employees::class)->getSumByDep($id, $startDate, $endDate);
        $departments = $this->getDoctrine()->getRepository(Departments::class)->findAll();
        

        return $this->render('/employees/byMonth.html.twig', array('query' => $query, 'department' => $departments));
    }

     /**
     * @Route("/employees/byYear")
     */
    public function byYear()
    {
        $startDate = new \DateTime('First Day of January');
        $endDate = new \DateTime('Last Day of December');
        $query = $this->getDoctrine()->getRepository(Employees::class)->getSum($startDate, $endDate);
        
        return $this->render('/employees/byYear.html.twig', array('query' => $query));
    }

}
