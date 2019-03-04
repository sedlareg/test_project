<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var Button[]
     * One customer has many buttons. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Button", mappedBy="customer")
     */
    private $buttons;

    /**
     * @var ExternalSale
     * @ORM\ManyToOne(targetEntity="ExternalSale", inversedBy="customers")
     */
    private $externalSale;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        $this->buttons = new ArrayCollection();
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
     * @return Customer
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Button[]|ArrayCollection
     */
    public function getButtons()
    {
        return $this->buttons;
    }

    /**
     * @param $buttons
     * @return Customer
     */
    public function setButtons($buttons): self
    {
        $this->buttons = $buttons;

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
