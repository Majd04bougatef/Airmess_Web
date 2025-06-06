<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReviewBonPlanRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReviewBonPlanRepository::class)]
#[ORM\Table(name: 'reviewbonplan')] 
class ReviewBonPlan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idR", type: "integer")]
    private ?int $idR = null;

    #[ORM\Column(name: "id_U", type: "integer")]
    #[Assert\NotBlank(message: "L'ID utilisateur est obligatoire")]
    private ?int $id_U = null;

    #[ORM\ManyToOne(targetEntity: BonPlan::class, inversedBy: "reviews")]
    #[ORM\JoinColumn(name: "idP", referencedColumnName: "idP", onDelete: "CASCADE")]
    #[Assert\NotBlank(message: "Le bon plan est obligatoire")]
    private ?BonPlan $bonPlan = null;

    #[ORM\Column(type: "text")]
    #[Assert\NotBlank(message: "Le commentaire est obligatoire")]
    #[Assert\Length(
        min: 3,
        max: 500,
        minMessage: "Le commentaire doit contenir au moins {{ limit }} caractères",
        maxMessage: "Le commentaire ne peut pas dépasser {{ limit }} caractères"
    )]
    private ?string $commente = null;

    #[ORM\Column(type: "integer")]
    #[Assert\NotBlank(message: "La note est obligatoire")]
    #[Assert\Range(
        min: 1,
        max: 5,
        notInRangeMessage: "La note doit être comprise entre {{ min }} et {{ max }}"
    )]
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
