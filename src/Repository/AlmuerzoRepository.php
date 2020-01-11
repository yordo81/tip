<?php

namespace App\Repository;

use App\Entity\Almuerzos;
use App\Entity\Hotel;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Almuerzo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Almuerzo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Almuerzo[]    findAll()
 * @method Almuerzo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlmuerzoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Almuerzos::class);
    }

//    /**
//     * @return Almuerzo[] Returns an array of Almuerzo objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Almuerzo
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getSum($startDate, $endDate)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            'SELECT SUM(c.pax) AS suma, d.hotelName
             FROM App\Entity\Almuerzos c
             JOIN c.hotel d
             WHERE c.date BETWEEN :startDate AND :endDate 
             GROUP BY c.hotel
             ORDER BY suma DESC
            ');
        $query->setParameters(array(
            'startDate' => $startDate,
            'endDate' => $endDate
        ));
        return $query->execute();
    }
}
