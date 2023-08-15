<?php

namespace App\Entity;

use App\Repository\DiplomaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiplomaRepository::class)
 */
class Diploma
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
     * @ORM\Column(type="string", length=100)
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity=Obtention::class, mappedBy="diploma", orphanRemoval=true)
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

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
            $obtention->setDiploma($this);
        }

        return $this;
    }

    public function removeObtention(Obtention $obtention): self
    {
        if ($this->obtentions->removeElement($obtention)) {
            // set the owning side to null (unless already changed)
            if ($obtention->getDiploma() === $this) {
                $obtention->setDiploma(null);
            }
        }

        return $this;
    }
}
