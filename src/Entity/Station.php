<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ReservationTransport;
use App\Repository\StationRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;


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

    #[ORM\OneToMany(mappedBy: "station", targetEntity: ReservationTransport::class, cascade: ["remove"])]
    private Collection $reservations;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank(message: "Le nom de la station est obligatoire")]
    #[Assert\Length(
        max: 255,
        maxMessage: "Le nom de la station ne peut pas dépasser {{ limit }} caractères"
    )]
    private string $nom;

    #[ORM\Column(type: "float")]
    #[Assert\NotBlank(message: "La latitude est obligatoire")]
    #[Assert\Type(
        type: "float",
        message: "La latitude doit être un nombre"
    )]
    private float $latitude;

    #[ORM\Column(type: "float")]
    #[Assert\NotBlank(message: "La longitude est obligatoire")]
    #[Assert\Type(
        type: "float",
        message: "La longitude doit être un nombre"
    )]
    private float $longitude;

    #[ORM\Column(type: "integer")]
    #[Assert\NotBlank(message: "La capacité est obligatoire")]
    #[Assert\GreaterThan(
        value: 10,
        message: "La capacité doit être supérieure à 10"
    )]
    private int $capacite;

    #[ORM\Column(name: "nombreVelo",type: "integer")]
    #[Assert\NotBlank(message: "Le nombre de vélos est obligatoire")]
    #[Assert\LessThanOrEqual(
        propertyPath: "capacite",
        message: "Le nombre de vélos ne peut pas être supérieur à la capacité"
    )]
    private int $nombreVelo;

    #[ORM\Column(name: "typeVelo",type: "string", length: 255)]
    #[Assert\NotBlank(message: "Le type de vélo est obligatoire")]
    #[Assert\Choice(
        choices: ["velo électrique", "velo urbain", "velo de route"],
        message: "Veuillez choisir un type de vélo valide"
    )]
    private string $typeVelo;

    #[ORM\Column(name: "prixHeure",type: "float")]
    #[Assert\NotBlank(message: "Le prix par heure est obligatoire")]
    #[Assert\GreaterThan(
        value: 0,
        message: "Le prix par heure doit être supérieur à 0"
    )]
    private float $prixHeure;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank(message: "Le pays est obligatoire")]
    private string $pays;

    #[ORM\Column(name: "statut", type: "string", length: 50)]
    #[Assert\NotBlank(message: "Le statut est obligatoire")]
    #[Assert\Choice(
        choices: ["active", "inactive"],
        message: "Le statut doit être 'active' ou 'inactive'"
    )]
    private string $statut = "active";

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

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return Collection<int, ReservationTransport>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(ReservationTransport $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setStation($this);
        }

        return $this;
    }

    public function removeReservation(ReservationTransport $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // Set the owning side to null (unless already changed)
            if ($reservation->getStation() === $this) {
                $reservation->setStation(null);
            }
        }

        return $this;
    }
    
}