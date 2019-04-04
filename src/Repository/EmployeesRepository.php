<?php

namespace App\Repository;

use App\Entity\Employees;
use App\Entity\CtrlMov;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Employees|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employees|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employees[]    findAll()
 * @method Employees[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Employees::class);
    }

//    /**
//     * @return Employees[] Returns an array of Employees objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Employees
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getSumByDay()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, e.name, e.lasname
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             WHERE c.date BETWEEN :startDate AND :endDate 
             GROUP BY c.employee
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => \DateTime::createFromFormat( "Y-m-d H:i:s", date("Y-m-d 00:00:00")),
            'endDate' => \DateTime::createFromFormat( "Y-m-d H:i:s", date("Y-m-d 23:59:59"))
        ));
        return $query->execute();
    }

    public function getSumByMonth()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, e.name, e.lasname
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             WHERE c.date BETWEEN :startDate AND :endDate 
             GROUP BY c.employee
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => new \DateTime('First Day of this Month'),
            'endDate' => new \DateTime('Last Day of this Month')
        ));
        return $query->execute();
    }

    public function getSumByYear()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, e.name, e.lasname
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             WHERE c.date BETWEEN :startDate AND :endDate 
             GROUP BY c.employee
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => new \DateTime('First Day of January'),
            'endDate' => \DateTime::createFromFormat( "Y-m-d H:i:s", date("Y-m-d 23:59:59"))
        ));
        return $query->execute();
    }

    /**
     * Estadisticas e Historico por trabajador
     */
    public function getSumByLastWeek()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, e.name, e.lasname
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             WHERE c.date BETWEEN :startDate AND :endDate 
             GROUP BY c.employee
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => new \DateTime('last week monday'),
            'endDate' => new \DateTime('last week sunday')
        ));
        return $query->execute();
    }

    public function getSumByLastMonth()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, e.name, e.lasname
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             WHERE c.date BETWEEN :startDate AND :endDate 
             GROUP BY c.employee
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => new \DateTime('first day of last month'),
            'endDate' => new \DateTime('last day of last month')
        ));
        return $query->execute();
    }

    public function getSumByLastYear()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, e.name, e.lasname
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             WHERE c.date BETWEEN :startDate AND :endDate 
             GROUP BY c.employee
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => new \DateTime('first day of January last year'),
            'endDate' => new \DateTime('last day of December last year')
        ));
        return $query->execute();
    }

    public function getSumByLastDay()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, e.name, e.lasname
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             WHERE c.date = :startDate 
             GROUP BY c.employee
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => new \DateTime('yesterday')
        ));
        return $query->execute();
    }
}
