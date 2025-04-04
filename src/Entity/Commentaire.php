<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentaireRepository;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
#[ORM\Table(name: "commentaire")]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idC", type: "integer")]
    private int $idC;

    #[ORM\ManyToOne(targetEntity: SocialMedia::class)]
    #[ORM\JoinColumn(name: "idEB", referencedColumnName: "idEB", nullable: false)]
    private ?SocialMedia $socialMedia = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "id_U", referencedColumnName: "id_U", nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "integer")]
    private int $numberlike;

    #[ORM\Column(type: "integer")]
    private int $numberdislike;

    

    // Getters et Setters

    public function getIdC(): int
    {
        return $this->idC;
    }

    public function getSocialMedia(): ?SocialMedia
    {
        return $this->socialMedia;
    }

    public function setSocialMedia(?SocialMedia $socialMedia): self
    {
        $this->socialMedia = $socialMedia;
        return $this;
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getNumberlike(): int
    {
        return $this->numberlike;
    }

    public function setNumberlike(int $numberlike): self
    {
        $this->numberlike = $numberlike;
        return $this;
    }

    public function getNumberdislike(): int
    {
        return $this->numberdislike;
    }

    public function setNumberdislike(int $numberdislike): self
    {
        $this->numberdislike = $numberdislike;
        return $this;
    }

   
}
