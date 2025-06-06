<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReservationTransportRepository;
use Symfony\Component\Validator\Constraints as Assert;


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
        $this->dateRes = new \DateTime('-1 hour');
    }

    #[ORM\Column(name: "dateRes", type: "datetime")]
    #[Assert\NotBlank(message: "La date de réservation est obligatoire")]
    #[Assert\GreaterThanOrEqual(
        value: "today",
        message: "La date de réservation doit être aujourd'hui ou dans le futur"
    )]
    private \DateTimeInterface $dateRes;

    #[ORM\Column(name: "dateFin", type: "datetime")]
    #[Assert\NotBlank(message: "La date de fin est obligatoire")]
    #[Assert\GreaterThan(
        propertyPath: "dateRes",
        message: "La date de fin doit être après la date de réservation"
    )]
    private \DateTimeInterface $dateFin;

    #[ORM\Column(name: "prix", type: "float")]
    private float $prix;

    #[ORM\Column(name: "statut", type: "string", length: 255)]
    private string $statut;

    #[ORM\Column(name: "reference", type: "string", length: 100)]
    private string $reference;

    #[ORM\Column(name: "nombreVelo", type: "integer")]
    #[Assert\NotBlank(message: "Le nombre de vélos est obligatoire")]
    #[Assert\GreaterThan(
        value: 0,
        message: "Le nombre de vélos doit être supérieur à 0"
    )]
    #[Assert\LessThanOrEqual(
        value: 10,
        message: "Le nombre de vélos ne peut pas dépasser 10"
    )]
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