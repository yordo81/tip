<?php

namespace App\Repository;

use App\Entity\CtrlMov;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

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
}
