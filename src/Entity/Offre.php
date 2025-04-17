<?php
// src/Entity/Offre.php
namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Enum\OffreStatus;

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

    #[Assert\NotBlank(message: 'Le prix initial est obligatoire.')]
    #[Assert\Positive(message: 'Le prix initial doit être positif.')]
    #[Assert\GreaterThan(
        value: 0,
        message: 'Le prix initial doit être supérieur à 0.'
    )]
    #[Assert\GreaterThan(
        propertyPath: 'priceAfter',
        message: 'Le prix initial doit être supérieur au prix après réduction.'
    )]
    #[ORM\Column(type: 'float')]
    private float $priceInit;

    #[Assert\NotBlank(message: 'Le prix après réduction est obligatoire.')]
    #[Assert\Positive(message: 'Le prix après réduction doit être positif.')]
    #[Assert\GreaterThan(
        value: 0,
        message: 'Le prix après réduction doit être supérieur à 0.'
    )]
    #[Assert\LessThan(
        propertyPath: 'priceInit',
        message: 'Le prix après réduction doit être inférieur au prix initial.'
    )]
    #[ORM\Column(type: 'float')]
    private float $priceAfter;

    #[Assert\NotBlank(message: 'La date de début est obligatoire.')]
    #[Assert\Type(
        type: \DateTimeInterface::class,
        message: 'La date de début doit être une date valide.'
    )]
    #[Assert\GreaterThanOrEqual(
        value: 'today',
        message: 'La date de début doit être au moins aujourd\'hui ou ultérieure.'
    )]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $startDate;

    #[Assert\NotBlank(message: 'La date de fin est obligatoire.')]
    #[Assert\Type(
        type: \DateTimeInterface::class,
        message: 'La date de fin doit être une date valide.'
    )]
    #[Assert\GreaterThan(
        propertyPath: 'startDate',
        message: 'La date de fin doit être après la date de début.'
    )]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $endDate;

    #[Assert\NotBlank(message: 'Le nombre de places est obligatoire.')]
    #[Assert\Type(
        type: 'integer',
        message: 'Le nombre de places doit être un nombre entier.'
    )]
    #[Assert\GreaterThan(
        value: 0,
        message: 'Le nombre de places doit être supérieur à 0.'
    )]
    #[ORM\Column(type: 'integer')]
    private int $numberLimit;

    #[Assert\NotBlank(message: 'La description est obligatoire.')]
    #[Assert\Length(
        min: 10,
        max: 1000,
        minMessage: 'La description doit contenir au moins {{ limit }} caractères.',
        maxMessage: 'La description ne peut pas dépasser {{ limit }} caractères.'
    )]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[Assert\NotBlank(message: 'Le lieu est obligatoire.')]
    #[Assert\Length(
        min: 2,
        max: 255,
        minMessage: 'Le lieu doit contenir au moins {{ limit }} caractères.',
        maxMessage: 'Le lieu ne peut pas dépasser {{ limit }} caractères.'
    )]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $place = null;

    #[Assert\Image(
        maxSize: '5M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
        mimeTypesMessage: 'Veuillez télécharger une image valide (JPEG, PNG, WebP).',
        maxSizeMessage: 'L\'image ne peut pas dépasser {{ limit }}.'
    )]
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $imagePath = null;

    #[ORM\Column(type: Types::TEXT)]
    private string $aidesc = '';

    #[ORM\Column(type: 'string', enumType: OffreStatus::class, options: ['default' => OffreStatus::EN_ATTENTE])]
    private OffreStatus $statusoff = OffreStatus::EN_ATTENTE;

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

    public function getStatusoff(): OffreStatus
    {
        return $this->statusoff;
    }

    public function setStatusoff(OffreStatus $statusoff): static
    {
        $this->statusoff = $statusoff;

        return $this;
    }
}

