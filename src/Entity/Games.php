<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GamesRepository")
 */
class Games
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tournoi", inversedBy="getNbGames")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_tournoi;

    /**
     * @ORM\Column(type="date")
     */
    private $date_match;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_spectateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe", inversedBy="getGames")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_equipe_1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_equipe_2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_point_equipe_1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_point_equipe_2;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Statistique", mappedBy="id_match")
     */
    private $stats;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LieuMatch", inversedBy="games")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieux_match;

    public function __construct()
    {
        $this->stats = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTournoi(): ?Tournoi
    {
        return $this->id_tournoi;
    }

    public function setIdTournoi(?Tournoi $id_tournoi): self
    {
        $this->id_tournoi = $id_tournoi;

        return $this;
    }

    public function getDateMatch(): ?\DateTimeInterface
    {
        return $this->date_match;
    }

    public function setDateMatch(\DateTimeInterface $date_match): self
    {
        $this->date_match = $date_match;

        return $this;
    }

    public function getNbSpectateur(): ?int
    {
        return $this->nb_spectateur;
    }

    public function setNbSpectateur(?int $nb_spectateur): self
    {
        $this->nb_spectateur = $nb_spectateur;

        return $this;
    }

    public function getIdEquipe1(): ?Equipe
    {
        return $this->id_equipe_1;
    }

    public function setIdEquipe1(?Equipe $id_equipe_1): self
    {
        $this->id_equipe_1 = $id_equipe_1;

        return $this;
    }

    public function getIdEquipe2(): ?Equipe
    {
        return $this->id_equipe_2;
    }

    public function setIdEquipe2(?Equipe $id_equipe_2): self
    {
        $this->id_equipe_2 = $id_equipe_2;

        return $this;
    }

    public function getNbPointEquipe1(): ?int
    {
        return $this->nb_point_equipe_1;
    }

    public function setNbPointEquipe1(?int $nb_point_equipe_1): self
    {
        $this->nb_point_equipe_1 = $nb_point_equipe_1;

        return $this;
    }

    public function getNbPointEquipe2(): ?int
    {
        return $this->nb_point_equipe_2;
    }

    public function setNbPointEquipe2(?int $nb_point_equipe_2): self
    {
        $this->nb_point_equipe_2 = $nb_point_equipe_2;

        return $this;
    }

    /**
     * @return Collection|Statistique[]
     */
    public function getStats(): Collection
    {
        return $this->stats;
    }

    public function addStat(Statistique $stat): self
    {
        if (!$this->stats->contains($stat)) {
            $this->stats[] = $stat;
            $stat->setIdMatch($this);
        }

        return $this;
    }

    public function removeStat(Statistique $stat): self
    {
        if ($this->stats->contains($stat)) {
            $this->stats->removeElement($stat);
            // set the owning side to null (unless already changed)
            if ($stat->getIdMatch() === $this) {
                $stat->setIdMatch(null);
            }
        }

        return $this;
    }

    public function getLieuxMatch(): ?LieuMatch
    {
        return $this->lieux_match;
    }

    public function setLieuxMatch(?LieuMatch $lieux_match): self
    {
        $this->lieux_match = $lieux_match;

        return $this;
    }
}
