<?php
declare(strict_types=1);

namespace App\Entity;

use App\Entity\TraitUtil\EntityIdTrait;
use App\Entity\TraitUtil\TimestampTrait;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\Table(name: '`product`')]
#[ApiResource]
class Product
{
    use EntityIdTrait;
    use TimestampTrait;

    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank]
    private string $name;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    #[Assert\NotBlank]
    private float $price;


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
