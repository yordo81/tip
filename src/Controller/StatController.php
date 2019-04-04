<?php

namespace App\Controller;

use App\Entity\Departments;
use App\Entity\Employees;
use App\Entity\CtrlMov;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StatController extends AbstractController
{
    
    /**
     * @Route("/stat")
     */
    public function byLastWeek()
    {
        $query = $this->getDoctrine()->getRepository(Employees::class)->getSumByLastWeek();
        
        return $this->render('/stat/index.html.twig', array('query' => $query));
    }

    /**
     * @Route("/stat/byLastMonth")
     */
    public function byLastMonth()
    {
        $query = $this->getDoctrine()->getRepository(Employees::class)->getSumByLastMonth();
        
        return $this->render('/stat/month.html.twig', array('query' => $query));
    }

    /**
     * @Route("/stat/byLastYear")
     */
    public function byLastYear()
    {
        $query = $this->getDoctrine()->getRepository(Employees::class)->getSumByLastYear();
        
        return $this->render('/stat/year.html.twig', array('query' => $query));
    }

    /**
     * @Route("/stat/byLastDay")
     */
    public function byLastDay()
    {
        $query = $this->getDoctrine()->getRepository(Employees::class)->getSumByLastDay();
        
        return $this->render('/stat/yesterday.html.twig', array('query' => $query));
    }
}
