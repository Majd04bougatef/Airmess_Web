<?php

namespace App\Entity;

use App\Repository\ExpenseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpenseRepository::class)]
#[ORM\Table(name: "expense")]
class Expense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idE", type: "integer")]
    private ?int $idE = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "id_U", referencedColumnName: "id_U", onDelete: "CASCADE")]
    private ?User $user = null;

    #[ORM\Column(type: "float")]
    private float $amount;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "string", length: 255)]
    private string $category;

    #[ORM\Column(name: "dateE", type: "date")]
    private \DateTimeInterface $dateE;

    #[ORM\Column(name: "nameEx", type: "string", length: 255)]
    private string $nameEx;

    #[ORM\Column(name: "Imagedepense", type: "string", length: 500)]
    private string $imagedepense;

    public function getIdE(): ?int
    {
        return $this->idE;
    }

    public function getId(): ?int
    {
        return $this->idE;
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

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getDateE(): \DateTimeInterface
    {
        return $this->dateE;
    }

    public function setDateE(\DateTimeInterface $dateE): self
    {
        $this->dateE = $dateE;
        return $this;
    }

    public function getNameEx(): string
    {
        return $this->nameEx;
    }

    public function setNameEx(string $nameEx): self
    {
        $this->nameEx = $nameEx;
        return $this;
    }

    public function getImagedepense(): string
    {
        return $this->imagedepense;
    }

    public function setImagedepense(string $imagedepense): self
    {
        $this->imagedepense = $imagedepense;
        return $this;
    }
}
