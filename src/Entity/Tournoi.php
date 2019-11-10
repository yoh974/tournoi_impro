<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut_tournoi;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin_tournoi;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Games", mappedBy="id_tournoi")
     */
    private $getNbGames;

    public function __construct()
    {
        $this->getNbGames = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getSaison(): ?string
    {
        return $this->saison;
    }

    /**
     * @param string $saison
     * @return Tournoi
     */
    public function setSaison(string $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNbreMatch(): ?int
    {
        $games = $this->getNbGames;
        return count($games);
    }

    /**
     * @param int|null $nbre_match
     * @return Tournoi
     */
    public function setNbreMatch(?int $nbre_match): self
    {
        $this->nbre_match = $nbre_match;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateDebutTournoi(): ?\DateTimeInterface
    {
        return $this->date_debut_tournoi;
    }

    /**
     * @param \DateTimeInterface $date_debut_tournoi
     * @return Tournoi
     */
    public function setDateDebutTournoi(\DateTimeInterface $date_debut_tournoi): self
    {
        $this->date_debut_tournoi = $date_debut_tournoi;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateFinTournoi(): ?\DateTimeInterface
    {
        return $this->date_fin_tournoi;
    }

    /**
     * @param \DateTimeInterface $date_fin_tournoi
     * @return Tournoi
     */
    public function setDateFinTournoi(\DateTimeInterface $date_fin_tournoi): self
    {
        $this->date_fin_tournoi = $date_fin_tournoi;

        return $this;
    }

    /**
     * @return Collection|Games[]
     */
    public function getGetNbGames(): Collection
    {
        return $this->getNbGames;
    }

    public function addGetNbGame(Games $getNbGame): self
    {
        if (!$this->getNbGames->contains($getNbGame)) {
            $this->getNbGames[] = $getNbGame;
            $getNbGame->setIdTournoi($this);
        }

        return $this;
    }

    public function removeGetNbGame(Games $getNbGame): self
    {
        if ($this->getNbGames->contains($getNbGame)) {
            $this->getNbGames->removeElement($getNbGame);
            // set the owning side to null (unless already changed)
            if ($getNbGame->getIdTournoi() === $this) {
                $getNbGame->setIdTournoi(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->saison;
    }
}
