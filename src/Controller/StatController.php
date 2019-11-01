<?php

namespace App\Controller;

use App\Entity\Departments;
use App\Entity\Employees;
use App\Entity\CtrlMov;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class StatController extends AbstractController
{
     
    /**
     * @Route("/stat")
     */
    public function byLastWeek()
    {
        $startDate = new \DateTime('last week monday');
        $endDate = new \DateTime('last week sunday');
        
        $query = $this->getDoctrine()->getRepository(Employees::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::Class)->getTotal($startDate, $endDate);
        
        return $this->render('/stat/index.html.twig', array('query' => $query, 'data' => $data));
    }

    /**
     * @Route("/stat/byLastMonth")
     */
    public function byLastMonth()
    {
        $startDate = new \DateTime('first day of last month');
        $endDate = new \DateTime('last day of last month');

        $query = $this->getDoctrine()->getRepository(Employees::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::Class)->getTotal($startDate, $endDate);

        return $this->render('/stat/index.html.twig', array('query' => $query, 'data' => $data));
    }

    /**
     * @Route("/stat/byLastYear")
     */
    public function byLastYear()
    {
        $startDate = new \DateTime('first day of January last year');
        $endDate = new \DateTime('last day of December last year');

        $query = $this->getDoctrine()->getRepository(Employees::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::Class)->getTotal($startDate, $endDate);

        return $this->render('/stat/index.html.twig', array('query' => $query, 'data' => $data));
    }

    /**
     * @Route("/stat/byLastDay")
     */
    public function byLastDay()
    {
        $startDate = new \DateTime('yesterday midnight');
        $endDate = new \DateTime('today midnight');

        $query = $this->getDoctrine()->getRepository(Employees::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::Class)->getTotal($startDate, $endDate);

        return $this->render('/stat/index.html.twig', array('query' => $query, 'data' => $data));
    }

    /**
     * @Route("/stat/selectDay") 
     */
    public function selectDay(Request $request)
    {
        $fecha = ($request->request->get('fecha')) ? $request->request->get('fecha') : NULL;
       

        $startDate = \DateTime::createFromFormat( "Y-m-d H:i:s", date("".$fecha." 00:00:00"));
        $endDate = \DateTime::createFromFormat( "Y-m-d H:i:s", date("".$fecha." 23:59:59"));

        $query = $this->getDoctrine()->getRepository(Employees::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::Class)->getTotal($startDate, $endDate);

        return $this->render('/stat/index.html.twig', array('query' => $query, 'data' => $data));
    }

    /**
     * @Route("/stat/Month")
     */
    public function month()
    {
        $startDate = new \DateTime('first day of this month');
        $endDate = new \DateTime('now');
        
        var_dump($startDate);
        var_dump($endDate);

        $query = $this->getDoctrine()->getRepository(Employees::class)->getSum($startDate, $endDate);
        $data = $this->getDoctrine()->getRepository(CtrlMov::Class)->getTotal($startDate, $endDate);

        return $this->render('/stat/index.html.twig', array('query' => $query, 'data' => $data));
    }
}
