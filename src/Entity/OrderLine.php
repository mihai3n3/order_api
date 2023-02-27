<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\TraitUtil\EntityIdTrait;
use App\Repository\OrderLineRepository;
use App\Entity\Order;
use App\State\OrderProductsProvider;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Metadata\Get;

#[ORM\Entity(repositoryClass: OrderLineRepository::class)]
#[ORM\Table(name: '`orderLine`')]
#[ApiResource]
#[ApiResource(
    uriTemplate: '/order/{orderId}/products',
    operations: [ new Get(provider: OrderProductsProvider::class) ],
    uriVariables: [
        'orderId' => new Link(fromClass: Order::class,fromProperty: 'orderLine'),
    ]
)]
class OrderLine
{
    Use EntityIdTrait;

    #[ORM\ManyToOne(targetEntity: Product::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private Product $product;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    #[Assert\NotBlank]
    private float $price;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'orderLines')]
    #[Assert\NotNull]
    private Order $order;

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }
}
