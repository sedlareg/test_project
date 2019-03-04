<?php

namespace App\Repository;

use App\Entity\Button;
use App\Entity\Customer;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Button|null find($id, $lockMode = null, $lockVersion = null)
 * @method Button|null findOneBy(array $criteria, array $orderBy = null)
 * @method Button[]    findAll()
 * @method Button[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ButtonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Button::class);
    }

    /**
     * @param Customer $customer
     * @return Button[]
     */
    public function findByCustomer(Customer $customer): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.customer = :customer')
            ->setParameter('customer', $customer)
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Product $product
     * @return Button[]
     */
    public function findByProduct(Product $product): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.product_id = :product')
            ->setParameter('product', $product)
            ->orderBy('b.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param string $buttonName
     * @return Button|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByName(string $buttonName): ?Button
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.name = :buttonName')
            ->setParameter('buttonName', $buttonName)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
