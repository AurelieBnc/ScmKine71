<?php

namespace App\Entity;

use App\Repository\ObtentionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObtentionRepository::class)
 */
class Obtention
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Practitioner::class, inversedBy="obtentions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $practitioner;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Diploma::class, inversedBy="obtentions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $diploma;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateObtained;


    public function getDateObtained(): ?\DateTimeInterface
    {
        return $this->dateObtained;
    }

    public function setDateObtained(\DateTimeInterface $dateObtained): self
    {
        $this->dateObtained = $dateObtained;

        return $this;
    }

    public function getPractitioner(): ?Practitioner
    {
        return $this->practitioner;
    }

    public function setPractitioner(?Practitioner $practitioner): self
    {
        $this->practitioner = $practitioner;

        return $this;
    }

    public function getDiploma(): ?Diploma
    {
        return $this->diploma;
    }

    public function setDiploma(?Diploma $diploma): self
    {
        $this->diploma = $diploma;

        return $this;
    }
}
