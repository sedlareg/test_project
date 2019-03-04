<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExternalSaleRepository")
 */
class ExternalSale
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var Customer[]
     * One ExternalSale can have many customer. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Customer", mappedBy="externalSale")
     */
    private $customers;

    /**
     * ExternalSale constructor.
     */
    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ExternalSale
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Customer[]|ArrayCollection
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param $customers
     * @return ExternalSale
     */
    public function setCustomers($customers): self
    {
        $this->customers = $customers;

        return $this;
    }
}
