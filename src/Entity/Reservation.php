<?php
// src/Entity/Reservation.php
namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'idR', type: 'integer')]
    private ?int $idR = null;

    #[Assert\NotNull(message: 'L\'offre associée est obligatoire.')]
    #[ORM\ManyToOne(targetEntity: Offre::class)]
    #[ORM\JoinColumn(name: 'idO', referencedColumnName: 'idO')]
    private ?Offre $offre = null;

    #[Assert\NotBlank(message: 'La date de réservation est obligatoire.')]
    #[Assert\Type(
        type: \DateTimeInterface::class,
        message: 'La date de réservation doit être une date valide.'
    )]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $dateRes;

    #[ORM\Column(type: Types::STRING, length: 50, nullable: true)]
    private ?string $modePaiement = 'carte';

    #[Assert\NotNull(message: 'L\'utilisateur est obligatoire.')]
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_U', referencedColumnName: 'id_U')]
    private ?User $user = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $nombre = 1;

    public function getIdR(): ?int
    {
        return $this->idR;
    }

    public function getDateRes(): ?\DateTimeInterface
    {
        return $this->dateRes;
    }

    public function setDateRes(\DateTimeInterface $dateRes): static
    {
        $this->dateRes = $dateRes;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->modePaiement;
    }

    public function setModePaiement(?string $modePaiement): static
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): static
    {
        $this->offre = $offre;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getNombre(): ?int
    {
        return $this->nombre;
    }

    public function setNombre(?int $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }
}

