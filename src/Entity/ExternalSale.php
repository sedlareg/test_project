<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

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
     * @var Customer[]|ArrayCollection
     * One ExternalSale has many customers. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Customer", mappedBy="externalSale", fetch="EXTRA_LAZY")
     */
    private $customers;

    /**
     * Customer constructor.
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
     * @return Customer[]|PersistentCollection
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param Customer[] $customers
     * @return ExternalSale
     */
    public function setCustomers(array $customers): self
    {
        $this->customers = $customers;

        return $this;
    }
}
