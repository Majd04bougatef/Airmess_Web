<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SocialMediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Commentaire;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SocialMediaRepository::class)]
#[ORM\Table(name: "socialmedia")]
class SocialMedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idEB", type: "integer")]
    private int $idEB;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "id_U", referencedColumnName: "id_U", nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank(message: "Le titre ne peut pas être vide")]
    #[Assert\Length(
        min: 5,
        max: 255,
        minMessage: "Le titre doit faire au moins {{ limit }} caractères",
        maxMessage: "Le titre ne peut pas dépasser {{ limit }} caractères"
    )]
    private string $titre;

    #[ORM\Column(type: "text")]
    #[Assert\NotBlank(message: "Le contenu ne peut pas être vide")]
    #[Assert\Length(
        min: 10,
        minMessage: "Le contenu doit faire au moins {{ limit }} caractères"
    )]
    private string $contenu;

    #[ORM\Column(type: "date", name: "publicationDate")]
    private \DateTimeInterface $publicationDate;
    
    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank(message: "Le lieu est obligatoire")]

    #[Assert\Length(
        max: 255,
        maxMessage: "Le lieu ne peut pas dépasser {{ limit }} caractères"
    )]
    private string $lieu;

    #[ORM\Column(type: "integer")]
    private int $likee;

    #[ORM\Column(type: "integer")]
    private int $dislike;

    #[ORM\Column(type: "string", length: 500)]
    private string $imagemedia = '';

    // Getters et Setters...

    public function getIdEB(): int
    {
        return $this->idEB;
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

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getPublicationDate(): \DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;
        return $this;
    }

    public function getLieu(): string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;
        return $this;
    }

    public function getLikee(): int
    {
        return $this->likee;
    }

    public function setLikee(int $likee): self
    {
        $this->likee = $likee;
        return $this;
    }

    public function getDislike(): int
    {
        return $this->dislike;
    }

    public function setDislike(int $dislike): self
    {
        $this->dislike = $dislike;
        return $this;
    }

    public function getImagemedia(): string
    {
        return $this->imagemedia;
    }

    public function setImagemedia(string $imagemedia): self
    {
        $this->imagemedia = $imagemedia;
        return $this;
    }

    #[ORM\OneToMany(mappedBy: 'socialMedia', targetEntity: Commentaire::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $commentaires;
    
    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }
    
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }
    
    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setSocialMedia($this);
        }
    
        return $this;
    }
    
    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            if ($commentaire->getSocialMedia() === $this) {
                $commentaire->setSocialMedia(null);
            }
        }
    
        return $this;
    }
}
