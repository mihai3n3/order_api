<?php
declare(strict_types=1);

namespace App\Entity\TraitUtil;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

trait TimestampTrait
{
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: false, options: ["default" => "CURRENT_TIMESTAMP"])]
    private DateTime $createdAt;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: false, options: ["default" => "CURRENT_TIMESTAMP"])]
    private DateTime $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}