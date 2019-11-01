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

class DepartmentsController extends AbstractController
{
    /**
     * @Route("/departments/", name="show_departments")
     * Method({"GET"})
     */
    public function index()
    {
       $departments = $this->getDoctrine()->getRepository
       (Departments::class)->findAll();

       return $this->render('departments/index.html.twig', array
       ('departments' => $departments));
    }

    /**
     * @Route("/departments/new", name="new_departmens")
     * Method({"GET", "POST"})
     */
    public function new(Request $request)
    {
        $departments = new Departments();

        $form = $this->createFormBuilder($departments)
        ->add('name', TextType::class, array('required' => 'false',
         'attr' =>array('class' => 'form-control'), 'label' => 'Nombre'))
        ->add('slug', TextType::class, array('attr' =>
        array('class' => 'form-control')))
        ->add('description', TextareaType::class, array(
            'attr' => array('class' => 'form-control'), 'label'=> 'Descripción'))
        ->add('save', SubmitType::class, array(
            'label' => 'Crear',
            'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $departments = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($departments);
            $entityManager->flush();

            return $this->redirectToRoute('show_departments');
        }

        return $this->render('departments/new.html.twig', array(
            'form' => $form->createView()
        ));

    }

    /**
     * @Route("/departments/edit/{id}")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id)
    {
        $departments = new Departments();
        $departments = $this->getDoctrine()->getRepository
        (Departments::class)->find($id);

        $form = $this->createFormBuilder($departments)
        ->add('name', TextType::class, array('required' => 'false',
         'attr' =>array('class' => 'form-control'), 'label' => 'Nombre'))
        ->add('slug', TextType::class, array('attr' =>
        array('class' => 'form-control')))
        ->add('description', TextareaType::class, array(
            'attr' => array('class' => 'form-control'), 'label' => 'Descripción'))
        ->add('save', SubmitType::class, array(
            'label' => 'Actualizar',
            'attr' => array('class' => 'btn btn-primary mt-3')
        ))
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('show_departments');
        }

        return $this->render('departments/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/departments/delete/{id}")
     * Method({"DELETE"})
     */
    public function delete(Request $request, $id)
    {
        $departments = $this->getDoctrine()->getRepository
        (Departments::class)->find($id);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($departments);
        $entityManager->flush();

        return $this->redirectToRoute('show_departments');
    }

    /**
     * @Route("/departments/")
     */
    public function bestYear()
    {
        return $this->render('departments/bestYear.html.twig', array('departments' => $departments));
    }

    /**
     * @Route("/departments/")
     */
    public function bestMonth()
    {
        return $this->render('departments/index.html.twig', array('departments' => $departments));
    }

    /**
     * @Route("/departments/byDay") 
     */
    public function byDay()
    {
        $startDate = \DateTime::createFromFormat( "Y-m-d H:i:s", date("Y-m-d 00:00:00"));
        $endDate = \DateTime::createFromFormat( "Y-m-d H:i:s", date("Y-m-d 23:59:59"));
        $query = $this->getDoctrine()->getRepository(CtrlMov::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::Class)->getTotal($startDate, $endDate);
       
        return $this->render('departments/byDay.html.twig', array('query' => $query, 'data' => $data));
    }

    /**
     * @Route("/departments/byWeek")
     */
    public function byWeek()
    {
        $startDate = new \DateTime('monday this week');
        $endDate = new \DateTime('sunday this Week');
        $query = $this->getDoctrine()->getRepository(CtrlMov::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::Class)->getTotal($startDate, $endDate);
        
        return $this->render('departments/byWeek.html.twig', array('query' => $query, 'data' => $data));
    }

    /**
     * @Route("/departments/byMonth")
     */
    public function byMonth()
    {
        $startDate = new \DateTime('First Day of this Month');
        $endDate = new \DateTime('Last Day of this Month');
        $query = $this->getDoctrine()->getRepository(CtrlMov::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::Class)->getTotal($startDate, $endDate);

        return $this->render('departments/byMonth.html.twig', array('query' => $query, 'data' => $data));
    }

    /**
     * @Route("/departments/byYear")
     */
    public function byYear()
    {
        $startDate = new \DateTime('First Day of January');
        $endDate = new \DateTime('Last Day of December');
        $query = $this->getDoctrine()->getRepository(CtrlMov::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::class)->getTotal($startDate, $endDate);
        
        return $this->render('departments/byYear.html.twig', array('query' => $query, 'data' => $data));
    }
}
