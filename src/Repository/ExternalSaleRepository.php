<?php

namespace App\Repository;

use App\Entity\ExternalSale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExternalSale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExternalSale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExternalSale[]    findAll()
 * @method ExternalSale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExternalSaleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExternalSale::class);
    }

    // /**
    //  * @return ExternalSale[] Returns an array of ExternalSale objects
    //  */
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
    public function findOneBySomeField($value): ?ExternalSale
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
