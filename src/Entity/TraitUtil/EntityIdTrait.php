<?php
declare(strict_types=1);

namespace App\Entity\TraitUtil;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

trait EntityIdTrait
{
    #[ORM\Id, ORM\Column(type: Types::INTEGER), ORM\GeneratedValue]
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }
}