<?php

namespace App\Repository;

use App\Entity\ImageMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageMatch|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageMatch|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageMatch[]    findAll()
 * @method ImageMatch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageMatchRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageMatch::class);
    }

    // /**
    //  * @return ImageMatch[] Returns an array of ImageMatch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageMatch
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
