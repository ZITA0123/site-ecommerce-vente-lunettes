<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductDiscountRepository")
 */
class ProductDiscount
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Product", inversedBy="productsDiscount", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $product_id;

    /**
     * @ORM\Column(type="float")
     */
    private $discount_value;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_created;

    /**
     * @ORM\Column(type="datetime")
     */
    private $valid_until;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?Product
    {
        return $this->product_id;
    }

    public function setProductId(Product $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getDiscountValue(): ?float
    {
        return $this->discount_value;
    }

    public function setDiscountValue(float $discount_value): self
    {
        $this->discount_value = $discount_value;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->date_created;
    }

    public function setDateCreated(\DateTimeInterface $date_created): self
    {
        $this->date_created = $date_created;

        return $this;
    }

    public function getValidUntil(): ?\DateTimeInterface
    {
        return $this->valid_until;
    }

    public function setValidUntil(\DateTimeInterface $valid_until): self
    {
        $this->valid_until = $valid_until;

        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return (String) $this->product_id;
    }

}
