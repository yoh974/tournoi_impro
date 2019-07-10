<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TournoiRepository")
 */
class Tournoi
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
    private $saison;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbre_match;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    public function getNbreMatch(): ?int
    {
        return $this->nbre_match;
    }

    public function setNbreMatch(?int $nbre_match): self
    {
        $this->nbre_match = $nbre_match;

        return $this;
    }
}
