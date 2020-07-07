<?php

namespace App\Repository;

use App\Entity\Boursier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Boursier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boursier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boursier[]    findAll()
 * @method Boursier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoursierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boursier::class);
    }

    // /**
    //  * @return Boursier[] Returns an array of Boursier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Boursier
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
