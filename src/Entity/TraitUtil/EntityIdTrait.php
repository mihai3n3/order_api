<?php
declare(strict_types=1);

namespace App\Entity\TraitUtil;

use Doctrine\ORM\Mapping as ORM;

trait EntityIdTrait
{
    #[ORM\Id, ORM\GeneratedValue()]
    #[ORM\Column(type: 'integer', unique: true)]
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }
}