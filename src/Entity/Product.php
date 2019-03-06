<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

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
     * @var Button[]|ArrayCollection
     * One customer has many buttons. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Button", mappedBy="product", fetch="EXTRA_LAZY")
     */
    private $buttons;

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
     * @return Product
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Button[]|PersistentCollection
     */
    public function getButtons()
    {
        return $this->buttons;
    }

    /**
     * @param Button[] $buttons
     * @return Product
     */
    public function setButtons(array $buttons): self
    {
        $this->buttons = $buttons;

        return $this;
    }
}
