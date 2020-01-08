<?php

namespace App\Repository;

use App\Entity\CtrlMov;
use App\Entity\Departments;
use App\Entity\Employees;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method CtrlMov|null find($id, $lockMode = null, $lockVersion = null)
 * @method CtrlMov|null findOneBy(array $criteria, array $orderBy = null)
 * @method CtrlMov[]    findAll()
 * @method CtrlMov[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CtrlMovRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CtrlMov::class);
    }

//    /**
//     * @return CtrlMov[] Returns an array of CtrlMov objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CtrlMov
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getIndexMonth($startDate, $endDate)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery(
                'SELECT c
                FROM App\Entity\CtrlMov c
                WHERE c.date BETWEEN :startDate AND :endDate'
                );
        $query->setParameters(array(
                    'startDate' => $startDate,
                    'endDate' => $endDate
                ));
    return $query->execute();
    }

    public function getSumAmount($id): array
    {

        $em = $this->getEntityManager();

        $query = $em->createQuery(
                'SELECT SUM(c.amount) as total
                FROM App\Entity\CtrlMov c
                WHERE c.employee = :id
                AND c.date BETWEEN :startDate AND :endDate'
                );
        $query->setParameters(array(
                    'id' => $id,
                    'startDate' => new \DateTime('First Day of January'),
                    'endDate' => \DateTime::createFromFormat( "Y-m-d H:i:s", date("Y-m-d 23:59:59"))
                ));
    return $query->execute();
    }
    
    /*
    * Realiza una suma por departamento, lo ordena de mayor a menor
    * en el lapso de tiempo establecido entre inicio y final
    */ 
    public function getSum($startDate, $endDate)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, d.name
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             JOIN e.department d
             WHERE c.date BETWEEN :startDate AND :endDate 
             GROUP BY d.id
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => $startDate,
            'endDate' => $endDate
        ));
        return $query->execute();
    }

    public function getTotal($startDate, $endDate)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma
             FROM App\Entity\CtrlMov c
             WHERE c.date BETWEEN :startDate AND :endDate 
            ');
        $query->setParameters(array(
            'startDate' => $startDate,
            'endDate' => $endDate
        ));
        return $query->execute();
    }
}
