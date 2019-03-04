<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */
class Customer
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
     * @var ExternalSale
     * @ORM\ManyToOne(targetEntity="ExternalSale")
     */
    private $externalSale;

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
     * @return Customer
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return ExternalSale
     */
    public function getExternalSale()
    {
        return $this->externalSale;
    }

    /**
     * @param $externalSale
     * @return Customer
     */
    public function setExternalSale($externalSale): self
    {
        $this->externalSale = $externalSale;

        return $this;
    }
}
