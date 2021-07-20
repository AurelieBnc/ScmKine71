<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $title;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $amCode;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $overtaking;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAmCode(): ?float
    {
        return $this->amCode;
    }

    public function setAmCode(?float $amCode): self
    {
        $this->amCode = $amCode;

        return $this;
    }

    public function getOvertaking(): ?int
    {
        return $this->overtaking;
    }

    public function setOvertaking(?int $overtaking): self
    {
        $this->overtaking = $overtaking;

        return $this;
    }
}
