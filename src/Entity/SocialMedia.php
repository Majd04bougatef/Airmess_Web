<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SocialMediaRepository;

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
    private string $titre;

    #[ORM\Column(type: "text")]
    private string $contenu;

#[ORM\Column(type: "date", name: "publicationDate")]
private \DateTimeInterface $publicationDate;
    

    #[ORM\Column(type: "string", length: 255)]
    private string $lieu;

    #[ORM\Column(type: "integer")]
    private int $likee;

    #[ORM\Column(type: "integer")]
    private int $dislike;

    #[ORM\Column(type: "string", length: 500)]
    private string $imagemedia;

    // Getters et Setters

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
}
