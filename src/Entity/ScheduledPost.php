<?php

namespace App\Entity;

use App\Repository\ScheduledPostRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ScheduledPostRepository::class)]
#[ORM\Table(name: "socialmedia")]
class ScheduledPost
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idEB")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $titre = null;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank]
    private ?string $contenu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieu = null;

    #[ORM\Column(type: 'datetime', name: "publicationDate")]
    #[Assert\NotBlank]
    #[Assert\GreaterThan('now')]
    private ?\DateTimeInterface $scheduledDate = null;

    #[ORM\ManyToOne(inversedBy: 'scheduledPosts')]
    #[ORM\JoinColumn(name: "id_U", referencedColumnName: "id_U", nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagemedia = null;

    #[ORM\Column(type: 'integer')]
    private int $likee = 0;

    #[ORM\Column(type: 'integer')]
    private int $dislike = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;
        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): static
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): static
    {
        $this->lieu = $lieu;
        return $this;
    }

    public function getScheduledDate(): ?\DateTimeInterface
    {
        return $this->scheduledDate;
    }

    public function setScheduledDate(\DateTimeInterface $scheduledDate): static
    {
        $this->scheduledDate = $scheduledDate;
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

    public function getImagemedia(): ?string
    {
        return $this->imagemedia;
    }

    public function setImagemedia(?string $imagemedia): static
    {
        $this->imagemedia = $imagemedia;
        return $this;
    }

    public function getLikee(): int
    {
        return $this->likee;
    }

    public function setLikee(int $likee): static
    {
        $this->likee = $likee;
        return $this;
    }

    public function getDislike(): int
    {
        return $this->dislike;
    }

    public function setDislike(int $dislike): static
    {
        $this->dislike = $dislike;
        return $this;
    }
} 