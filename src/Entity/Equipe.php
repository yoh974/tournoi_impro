<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipeRepository")
 * @Vich\Uploadable
 */
class Equipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_equipe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Games", mappedBy="id_equipe_1")
     */
    private $getGames;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="equipe_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updatedAt;


    public function __construct()
    {
        $this->nom_de_scene = new ArrayCollection();
        $this->getGames = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNomEquipe(): ?string
    {
        return $this->nom_equipe;
    }

    public function setNomEquipe(string $nom_equipe): self
    {
        $this->nom_equipe = $nom_equipe;

        return $this;
    }

    /**
     * @return Collection|Games[]
     */
    public function getGetGames(): Collection
    {
        return $this->getGames;
    }

    public function addGetGame(Games $getGame): self
    {
        if (!$this->getGames->contains($getGame)) {
            $this->getGames[] = $getGame;
            $getGame->setIdEquipe1($this);
        }

        return $this;
    }

    public function removeGetGame(Games $getGame): self
    {
        if ($this->getGames->contains($getGame)) {
            $this->getGames->removeElement($getGame);
            // set the owning side to null (unless already changed)
            if ($getGame->getIdEquipe1() === $this) {
                $getGame->setIdEquipe1(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->nom_equipe;
    }
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }


}
