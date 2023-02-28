<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\TraitUtil\EntityIdTrait;
use App\Entity\TraitUtil\TimestampTrait;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: '`order`')]
#[ApiResource]
class Order
{
    use EntityIdTrait;
    use TimestampTrait;

    #[ORM\Column(type: Types::FLOAT, precision: 10, scale: 2)]
    #[Assert\NotBlank]
    private float $totalPrice;

    #[ORM\OneToMany(mappedBy: 'delivery', targetEntity: OrderLine::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $orderLines;

    public function __construct()
    {
        $this->orderLines = new ArrayCollection();
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getOrderLines(): Collection
    {
        return $this->orderLines;
    }

    public function addOrderLine(OrderLine $orderLine): self
    {
        if (!$this->orderLines->contains($orderLine)) {
            $this->orderLines[] = $orderLine;
            $orderLine->setOrder($this);
        }

        return $this;
    }

    public function removeOrderLine(OrderLine $orderLine): self
    {
        if ($this->orderLines->removeElement($orderLine)) {
            // set the owning side to null (unless already changed)
            if ($orderLine->getOrder() === $this) {
                $orderLine->setOrder(null);
            }
        }

        return $this;
    }
}
