<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
     * One Product can be defined in many buttons. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Button", mappedBy="product")
     */
    private $buttons;

    /**
     * Product constructor.
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
     * @return Product
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
     * @return Product
     */
    public function setButtons($buttons): self
    {
        $this->buttons = $buttons;

        return $this;
    }
}
