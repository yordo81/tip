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
//Esta se esta comentando provicionalmente
    public function getSum($startDate, $endDate)
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
            'startDate' => $startDate,
            'endDate' => $endDate
        ));
        return $query->execute();
    }

    //Obtiene la suma por departamento
    public function getSumByDep($id, $startDate, $endDate)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, e.name, e.lasname
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             WHERE e.department = :id AND c.date BETWEEN :startDate AND :endDate 
             GROUP BY c.employee
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'id' => $id,
            'startDate' => $startDate,
            'endDate' => $endDate
        ));
        return $query->execute();
    }
 
//En esta se quiere que salga el nombre del dpto.
 /*   public function getSumByDep($startDate, $endDate)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, d.name, e.name, e.lasname
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             JOIN e.department d
             WHERE c.date BETWEEN :startDate AND :endDate 
             GROUP BY c.employee
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => $startDate,
            'endDate' => $endDate
        ));
        return $query->execute();
    }
    */
}
