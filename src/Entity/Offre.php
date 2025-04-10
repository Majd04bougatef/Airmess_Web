<?php
// src/Entity/Offre.php
namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'idO', type: 'integer')]
    private ?int $idO = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_U', referencedColumnName: 'id_U')]
    private ?User $user = null;

#[Assert\GreaterThan(
        propertyPath: 'priceAfter',
        message: 'Le prix initial doit être supérieur au prix après réduction.'
    )]
    #[ORM\Column(type: 'float')]
    private float $priceInit;

#[Assert\LessThan(
        propertyPath: 'priceInit',
        message: 'Le prix après réduction doit être inférieur au prix initial.'
    )]
    #[ORM\Column(type: 'float')]
    private float $priceAfter;

#[Assert\NotBlank(message: 'La date de début est obligatoire.')]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $startDate;

#[Assert\GreaterThan(
        propertyPath: 'startDate',
        message: 'La date de fin doit être après la date de début.'
    )]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $endDate;

    #[ORM\Column(type: 'integer')]
    private int $numberLimit;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $place = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $imagePath = null;

    #[ORM\Column(type: Types::TEXT)]
    private string $aidesc = '';

    public function getIdO(): ?int
    {
        return $this->idO;
    }

    public function getPriceInit(): ?float
    {
        return $this->priceInit;
    }

    public function setPriceInit(float $priceInit): static
    {
        $this->priceInit = $priceInit;

        return $this;
    }

    public function getPriceAfter(): ?float
    {
        return $this->priceAfter;
    }

    public function setPriceAfter(float $priceAfter): static
    {
        $this->priceAfter = $priceAfter;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getNumberLimit(): ?int
    {
        return $this->numberLimit;
    }

    public function setNumberLimit(int $numberLimit): static
    {
        $this->numberLimit = $numberLimit;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(?string $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): static
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function getAidesc(): ?string
    {
        return $this->aidesc;
    }

    public function setAidesc(string $aidesc): static
    {
        $this->aidesc = $aidesc;

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

