<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_match;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_spectateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tournoi")
     */
    private $id_tournoi;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe")
     */
    private $id_equipe_1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe")
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


    public function __construct()
    {
        $this->id_equipe = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdTournoi(): ?Tournoi
    {
        return $this->id_tournoi;
    }

    public function setIdTournoi(?Tournoi $id_tournoi): self
    {
        $this->id_tournoi = $id_tournoi;

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



}
