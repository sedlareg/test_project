<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ButtonRepository")
 */
class Button
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
     * @var Customer
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="buttons")
     *
     * Diese Zeile kann auch entfallen, weil das die Default Values sind
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @var Product
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="buttons")
     *
     * Diese Zeile kann auch entfallen, weil das die Default Values sind
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product;


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
     * @return Button
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return Button
     */
    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return Button
     */
    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
