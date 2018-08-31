<?php

namespace App\Controller;

use App\Entity\Departments;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        $departments = $this->getDoctrine()->getRepository
       (Departments::class)->findAll();

       return $this->render('departments/index.html.twig', array
       ('departments' => $departments));
    }
}
