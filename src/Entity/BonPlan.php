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

    #[ORM\Column(name: 'id_u', type: 'integer')]
    private ?int $id_u = null;

    #[ORM\Column(name: 'nomplace', type: 'string', length: 255)]
    private ?string $nomplace = null;

    #[ORM\Column(name: 'localisation', type: 'string', length: 255, nullable: true)]
    private ?string $localisation = null;

    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'typePlace', type: 'string', length: 255, nullable: true)]
    private ?string $typePlace = null;

    #[ORM\Column(name: 'imageBP', type: 'string', length: 500, nullable: true)]
    private ?string $imageBP = null;

    // Getters and setters
    public function getId(): ?int
    {
        return $this->idP;
    }

    public function getIdP(): ?int
    {
        return $this->idP;
    }

    public function getIdU(): ?int
    {
        return $this->id_u;
    }

    public function setIdU(int $id_u): self
    {
        $this->id_u = $id_u;
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

    public function setTypePlace(?string $typePlace): self
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