<?php

namespace App\Controller;

use App\Entity\Departments;
use App\Entity\Almuerzos;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
       $user = $this->getUser();
       if ($user->hasRole('ROLE_COMERCIAL')) 
       {
            $data = $this->getDoctrine()->getRepository
            (Almuerzos::class)->findAll();
            return $this->render('almuerzo/index.html.twig', array('data' => $data));
       } elseif ($user->hasRole('ROLE_USER'))
       {
            return $this->render('/ctrlmov/chart.html.twig');
       }
    }
}
