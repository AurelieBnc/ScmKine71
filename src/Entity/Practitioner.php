<?php

namespace App\Entity;

use App\Repository\PractitionerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PractitionerRepository::class)
 */
class Practitioner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Obtention::class, mappedBy="practitioner", orphanRemoval=true)
     */
    private $obtentions;

    public function __construct()
    {
        $this->obtentions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Obtention[]
     */
    public function getObtentions(): Collection
    {
        return $this->obtentions;
    }

    public function addObtention(Obtention $obtention): self
    {
        if (!$this->obtentions->contains($obtention)) {
            $this->obtentions[] = $obtention;
            $obtention->setPractitioner($this);
        }

        return $this;
    }

    public function removeObtention(Obtention $obtention): self
    {
        if ($this->obtentions->removeElement($obtention)) {
            // set the owning side to null (unless already changed)
            if ($obtention->getPractitioner() === $this) {
                $obtention->setPractitioner(null);
            }
        }

        return $this;
    }
}
