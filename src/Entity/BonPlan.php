<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BonPlanRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: BonPlanRepository::class)]
#[ORM\Table(name: "bonplan")]
class BonPlan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'idP', type: 'integer')]
    private ?int $idP = null;

    #[ORM\Column(name: 'id_u', type: 'integer')]
    #[Assert\NotBlank(message: "L'ID utilisateur est obligatoire")]
    private ?int $id_u = null;

    #[ORM\Column(name: 'nomplace', type: 'string', length: 255)]
    #[Assert\NotBlank(message: "Le nom du lieu est obligatoire")]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: "Le nom du lieu doit contenir au moins {{ limit }} caractères",
        maxMessage: "Le nom du lieu ne peut pas dépasser {{ limit }} caractères"
    )]
    private ?string $nomplace = null;

    #[ORM\Column(name: 'localisation', type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank(message: "La localisation est obligatoire")]
    private ?string $localisation = null;

    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    #[Assert\NotBlank(message: "La description est obligatoire")]
    #[Assert\Length(
        min: 10,
        max: 500,
        minMessage: "La description doit contenir au moins {{ limit }} caractères",
        maxMessage: "La description ne peut pas dépasser {{ limit }} caractères"
    )]
    private ?string $description = null;

    #[ORM\Column(name: 'typePlace', type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank(message: "Le type de lieu est obligatoire")]
    #[Assert\Choice(
        choices: ['resto', 'coworkingspace', 'cafe', 'musée'],
        message: "Le type de lieu doit être l'un des suivants: resto, coworkingspace, cafe, musée"
    )]
    private ?string $typePlace = null;

    #[ORM\Column(name: 'imageBP', type: 'string', length: 500, nullable: true)]
    private ?string $imageBP = null;

    #[ORM\Column(name: 'hasVRContent', type: 'boolean', options: ['default' => false])]
    private bool $hasVRContent = false;

    #[ORM\Column(name: 'vrModelPath', type: 'string', length: 500, nullable: true)]
    private ?string $vrModelPath = null;
    
    #[ORM\Column(name: 'vr360ImagePath', type: 'string', length: 500, nullable: true)]
    private ?string $vr360ImagePath = null;

    #[ORM\OneToMany(mappedBy: 'bonPlan', targetEntity: ReviewBonPlan::class, cascade: ['persist', 'remove'])]
    private Collection $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

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

    public function hasVRContent(): bool
    {
        return $this->hasVRContent;
    }

    public function setHasVRContent(bool $hasVRContent): self
    {
        $this->hasVRContent = $hasVRContent;
        return $this;
    }

    public function getVrModelPath(): ?string
    {
        return $this->vrModelPath;
    }

    public function setVrModelPath(?string $vrModelPath): self
    {
        $this->vrModelPath = $vrModelPath;
        return $this;
    }

    public function getVr360ImagePath(): ?string
    {
        return $this->vr360ImagePath;
    }

    public function setVr360ImagePath(?string $vr360ImagePath): self
    {
        $this->vr360ImagePath = $vr360ImagePath;
        return $this;
    }

    /**
     * @return Collection<int, ReviewBonPlan>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(ReviewBonPlan $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setBonPlan($this);
        }

        return $this;
    }

    public function removeReview(ReviewBonPlan $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getBonPlan() === $this) {
                $review->setBonPlan(null);
            }
        }

        return $this;
    }
}