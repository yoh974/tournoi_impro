<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatistiqueRepository")
 */
class Statistique
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personne", inversedBy="stats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_personne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Games", inversedBy="stats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_match;

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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getIdPersonne(): ?Personne
    {
        return $this->id_personne;
    }

    public function setIdPersonne(?Personne $id_personne): self
    {
        $this->id_personne = $id_personne;

        return $this;
    }

    public function getIdMatch(): ?Games
    {
        return $this->id_match;
    }

    public function setIdMatch(?Games $id_match): self
    {
        $this->id_match = $id_match;

        return $this;
    }
}
