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

    public function getSumAmount($id): array
    {

        $em = $this->getEntityManager();

        $query = $em->createQuery(
                'SELECT SUM(p.amount) as total
                FROM App\Entity\CtrlMov p
                WHERE p.employee = :id'
                )->setParameter('id', $id);

    // returns an array of Product objects
    return $query->execute();
    }
    
    /*
    * Realiza una suma por departamento, lo ordena de mayor a menor
    * en el lapso de tiempo establecido entre inicio y final
    */ 
    public function getSumByYear()
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
            'startDate' => new \DateTime('First Day of January'),
            'endDate' => new \DateTime('Today')
        ));
        return $query->execute();
    }

    public function getSumByMonth()
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
            'startDate' => new \DateTime('First Day of this Month'),
            'endDate' => new \DateTime('Last Day of this Month')
        ));
        return $query->execute();
    }

    public function getSumByDay()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.amount) AS suma, d.name
             FROM App\Entity\CtrlMov c
             JOIN c.employee e
             JOIN e.department d
             WHERE c.date = :endDate 
             GROUP BY d.id
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'endDate' => new \DateTime('Today')
        ));
        return $query->execute();
    }


//Aqui Poner la paginacion
    public function paginate($dql, $page = 1, $limit = 3)
{
    $paginator = new Paginator($dql);

    $paginator->getQuery()
        ->setFirstResult($limit * ($page - 1)) // Offset
        ->setMaxResults($limit); // Limit

    return $paginator;
}

public function getAllPers($currentPage = 1, $limit = 3)
{
    // Create our query
    $query = $this->createQueryBuilder('p')
        ->getQuery();


    $paginator = $this->paginate($query, $currentPage, $limit);

    return array('paginator' => $paginator, 'query' => $query);
}

    
}
