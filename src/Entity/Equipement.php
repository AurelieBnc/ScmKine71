<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=EquipementRepository::class)
 * @Vich\Uploadable
 */
class Equipement
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="photo_equipement", fileNameProperty="image")
     *@var File;
     */
    private $imageFile;

    /**
     * @ORM\Column(type="text")
     */
    private $describeEquipement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile(File $file = null):void
    {
        $this->imageFile = $file;

    }

    public function getDescribeEquipement(): ?string
    {
        return $this->describeEquipement;
    }

    public function setDescribeEquipement(string $describeEquipement): self
    {
        $this->describeEquipement = $describeEquipement;

        return $this;
    }
}
