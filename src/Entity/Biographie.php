<?php

namespace App\Entity;

use App\Repository\BiographieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BiographieRepository::class)
 * @Vich\Uploadable
 */
class Biographie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="biographie", cascade={"persist", "remove"})
     */
    private $User;

    /**
    * @Vich\UploadableField(mapping="photo_file", fileNameProperty="photo")
    * @Assert\File(
    *      maxSize = "2M",
    *      mimeTypes = {
    *              "image/jpg", "image/jpg",
    *              "image/jpeg", "image/jpeg",
    *              "image/png", "image/webp"},
    * )
    * @var File|null
    */
    private $photoFile;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get )
     *
     * @return  File|null
     */ 
    public function getPhotoFile()
    {
        return $this->photoFile;
    }

    /**
     * Set )
     *
     * @param  File|null  $photoFile  )
     *
     * @return  self
     */ 
    public function setPhotoFile($photoFile)
    {
        $this->photoFile = $photoFile;

        return $this;
    }
}
