<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReservationTransportRepository;

#[ORM\Entity(repositoryClass: ReservationTransportRepository::class)]
#[ORM\Table(name: "reservation_transport")]
class ReservationTransport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id", type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "id_U", referencedColumnName: "id_U", nullable: true)]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: Station::class)]
    #[ORM\JoinColumn(name: "idS", referencedColumnName: "idS", nullable: true)]
    private ?Station $station = null;

    public function __construct()
    {
        $this->dateRes = new \DateTime(); // Définit la date actuelle par défaut
    }

    #[ORM\Column(name: "dateRes", type: "datetime")]
    private \DateTimeInterface $dateRes;

    #[ORM\Column(name: "dateFin", type: "datetime")]
    private \DateTimeInterface $dateFin;

    #[ORM\Column(name: "prix", type: "float")]
    private float $prix;

    #[ORM\Column(name: "statut", type: "string", length: 255)]
    private string $statut;

    #[ORM\Column(name: "reference", type: "string", length: 100)]
    private string $reference;

    #[ORM\Column(name: "nombreVelo", type: "integer")]
    private int $nombreVelo;

    // Getters et Setters

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): self
    {
        $this->station = $station;
        return $this;
    }

    public function getDateRes(): \DateTimeInterface
    {
        return $this->dateRes;
    }

    public function setDateRes(\DateTimeInterface $dateRes): self
    {
        $this->dateRes = $dateRes;
        return $this;
    }

    public function getDateFin(): \DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;
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
}
