<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BonPlanRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BonPlanRepository::class)]
#[ORM\Table(name: "bonplan")]
class BonPlan
{
     #[ORM\Id]
     #[ORM\GeneratedValue]
     #[ORM\Column(name: 'idP', type: 'integer')]
    private ?int $idP = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull(message: "L'utilisateur est requis.")]
    #[Assert\Positive(message: "L'identifiant de l'utilisateur doit être un nombre positif.")]
    private ?int $id_U = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: "Le nom de la place est requis.")]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: "Le nom doit contenir au moins {{ limit }} caractères.",
        maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $nomplace = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: "La localisation ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $localisation = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\Length(
        max: 1000,
        maxMessage: "La description ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $description = null;

    #[ORM\Column(name: 'typePlace', type: 'string', length: 20)]
    #[Assert\NotBlank(message: "Le type de place est requis.")]
    #[Assert\Choice(
        choices: ['restaurant', 'hôtel', 'activité', 'autre'],
        message: "Choisissez un type valide : restaurant, hôtel, activité ou autre."
    )]
private ?string $typePlace = null;



#[ORM\Column(name: 'imageBP', type: 'string', length: 500, nullable: true)]
private ?string $imageBP = null;

    // Getters et Setters
    public function getId(): ?int
    {
        return $this->idP;
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

    public function getNomplace(): ?string
    {
        return $this->nomplace;
    }

    public function setNomplace(string $nomplace): self
    {
        $this->nomplace = $nomplace;
        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(?string $localisation): self
    {
        $this->localisation = $localisation;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getTypePlace(): ?string
    {
        return $this->typePlace;
    }

    public function setTypePlace(string $typePlace): self
    {
        $this->typePlace = $typePlace;
        return $this;
    }

    public function getImageBP(): ?string
    {
        return $this->imageBP;
    }

    public function setImageBP(?string $imageBP): self
    {
        $this->imageBP = $imageBP;
        return $this;
    }
}