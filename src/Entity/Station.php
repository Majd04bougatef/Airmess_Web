<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StationRepository;

#[ORM\Entity(repositoryClass: StationRepository::class)]
#[ORM\Table(name: "station")]
class Station
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idS",type: "integer")]
    private int $idS;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "stations")]
    #[ORM\JoinColumn(name: "id_U", referencedColumnName: "id_U", nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: "string", length: 255)]
    private string $nom;

    #[ORM\Column(type: "float")]
    private float $latitude;

    #[ORM\Column(type: "float")]
    private float $longitude;

    #[ORM\Column(type: "integer")]
    private int $capacite;

    #[ORM\Column(name: "nombreVelo",type: "integer")]
    private int $nombreVelo;

    #[ORM\Column(name: "typeVelo",type: "string", length: 255)]
    private string $typeVelo;

    #[ORM\Column(name: "prixHeure",type: "float")]
    private float $prixHeure;

    #[ORM\Column(name: "pays",type: "string", length: 50)]
    private string $pays;

    // Getters et Setters

    public function getIdS(): int
    {
        return $this->idS;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }


    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getCapacite(): int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;
        return $this;
    }

    public function getNombreVelo(): int
    {
        return $this->nombreVelo;
    }

    public function setNombreVelo(int $nombreVelo): self
    {
        $this->nombreVelo = $nombreVelo;
        return $this;
    }

    public function getTypeVelo(): string
    {
        return $this->typeVelo;
    }

    public function setTypeVelo(string $typeVelo): self
    {
        $this->typeVelo = $typeVelo;
        return $this;
    }

    public function getPrixHeure(): float
    {
        return $this->prixHeure;
    }

    public function setPrixHeure(float $prixHeure): self
    {
        $this->prixHeure = $prixHeure;
        return $this;
    }

    public function getPays(): string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;
        return $this;
    }

    
}
