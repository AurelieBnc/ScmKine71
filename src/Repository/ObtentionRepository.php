<?php

namespace App\Repository;

use App\Entity\Obtention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Obtention|null find($id, $lockMode = null, $lockVersion = null)
 * @method Obtention|null findOneBy(array $criteria, array $orderBy = null)
 * @method Obtention[]    findAll()
 * @method Obtention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObtentionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Obtention::class);
    }

    // /**
    //  * @return Obtention[] Returns an array of Obtention objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Obtention
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
