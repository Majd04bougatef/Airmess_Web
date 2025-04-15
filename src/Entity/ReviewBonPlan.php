<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReviewBonPlanRepository;

#[ORM\Entity(repositoryClass: ReviewBonPlanRepository::class)]
#[ORM\Table(name: 'reviewbonplan')] 
class ReviewBonPlan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idR", type: "integer")]
    private ?int $idR = null;

    #[ORM\Column(type: 'integer')]
    private ?int $id_U = null;

    #[ORM\ManyToOne(targetEntity: BonPlan::class)]
    #[ORM\JoinColumn(name: 'idP', referencedColumnName: 'idP', onDelete: 'CASCADE')]
    private ?BonPlan $bonPlan = null;

    #[ORM\Column(type: 'text')]
    private ?string $commente = null;

    #[ORM\Column(type: 'integer')]
    private ?int $rating = null;

    // Getters et Setters
    public function getIdR(): ?int
    {
        return $this->idR;
    }

    public function getIdU(): ?int
    {
        return $this->id_U;
    }

    public function setIdU(int $id_U): self
    {
        $this->id_U = $id_U;
        return $this;
    }

    public function getBonPlan(): ?BonPlan
    {
        return $this->bonPlan;
    }

    public function setBonPlan(?BonPlan $bonPlan): self
    {
        $this->bonPlan = $bonPlan;
        return $this;
    }

    public function getCommente(): ?string
    {
        return $this->commente;
    }

    public function setCommente(string $commente): self
    {
        $this->commente = $commente;
        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;
        return $this;
    }
}
