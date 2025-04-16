<?php
// src/Entity/Reservation.php
namespace App\Entity;

use App\Enum\PaymentMode;
use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'idR', type: 'integer')]
    private ?int $idR = null;

    #[ORM\ManyToOne(targetEntity: Offre::class)]
    #[ORM\JoinColumn(name: 'idO', referencedColumnName: 'idO')]
    private ?Offre $offre = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $dateRes;

    #[ORM\Column(type: Types::STRING, enumType: PaymentMode::class)]
    private PaymentMode $modePaiement;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_U', referencedColumnName: 'id_U')]
    private ?User $user = null;

    // Getters/setters...

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

    public function getModePaiement(): ?PaymentMode
    {
        return $this->modePaiement;
    }

    public function setModePaiement(PaymentMode $modePaiement): static
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
}

