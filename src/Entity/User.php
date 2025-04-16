<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: "users")]
#[UniqueEntity(fields: ['email'], message: 'Cette adresse email est déjà utilisée')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_U", type: "integer")]
    private ?int $id_U = null;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank(message: "Le nom est obligatoire")]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: "Le nom doit faire au moins {{ limit }} caractères",
        maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères"
    )]
    private string $name;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: "Le prénom doit faire au moins {{ limit }} caractères",
        maxMessage: "Le prénom ne peut pas dépasser {{ limit }} caractères"
    )]
    private ?string $prenom = null;

    #[ORM\Column(type: "string", length: 255, unique: true, nullable: false)]
    #[Assert\NotBlank(message: "L'email est obligatoire")]
    #[Assert\Email(message: "L'email '{{ value }}' n'est pas valide")]
    #[Assert\Length(
        max: 180,
        maxMessage: "L'email ne peut pas dépasser {{ limit }} caractères"
    )]
    private string $email;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank(message: "Le mot de passe est obligatoire")]
    #[Assert\Length(
        min: 6,
        minMessage: "Le mot de passe doit faire au moins {{ limit }} caractères"
    )]
    private string $password;

    #[ORM\Column(name: "roleUser", type: "string", length: 50, nullable: false)]
    #[Assert\NotBlank(message: "Le rôle est obligatoire")]
    #[Assert\Choice(
        choices: ["Voyageurs", "Entreprise", "Admin"],
        message: "Le rôle doit être 'Voyageurs', 'Entreprise' ou 'Admin'"
    )]
    private string $roleUser;

    #[ORM\Column(name: "dateNaiss", type: "date", nullable: true)]
    #[Assert\Type(
        type: "\DateTimeInterface",
        message: "La date n'est pas au format valide"
    )]
    #[Assert\LessThanOrEqual(
        value: "-15 years",
        message: "Vous devez avoir au moins 15 ans pour vous inscrire"
    )]
    private ?\DateTimeInterface $dateNaiss = null;

    #[ORM\Column(name: "phoneNumber", type: "string", length: 20, nullable: false)]
    #[Assert\NotBlank(message: "Le numéro de téléphone est obligatoire")]
    #[Assert\Regex(
        pattern: "/^[0-9]{8}$/",
        message: "Le numéro de téléphone doit contenir exactement 8 chiffres"
    )]
    private string $phoneNumber;

    #[ORM\Column(name: "statut", type: "string", length: 10, nullable: false)]
    #[Assert\NotBlank(message: "Le statut est obligatoire")]
    #[Assert\Choice(
        choices: ["actif", "inactif"],
        message: "Le statut doit être 'actif' ou 'inactif'"
    )]
    private string $statut;

    #[ORM\Column(name: "diamond", type: "integer", nullable: false)]
    #[Assert\NotNull(message: "Le nombre de diamants est obligatoire")]
    #[Assert\PositiveOrZero(message: "Le nombre de diamants ne peut pas être négatif")]
    #[Assert\LessThan(
        value: 1000000,
        message: "Le nombre de diamants ne peut pas dépasser {{ compared_value }}"
    )]
    private int $diamond;

    #[ORM\Column(name: "deleteFlag", type: "integer", nullable: false)]
    #[Assert\NotNull(message: "Le deleteFlag est obligatoire")]
    #[Assert\Choice(
        choices: [0, 1],
        message: "Le deleteFlag doit être 0 ou 1"
    )]
    private int $deleteFlag;

    #[ORM\Column(name: "imagesU", type: "string", length: 255, nullable: false)]
    #[Assert\NotBlank(message: "L'image est obligatoire")]
    #[Assert\Length(
        max: 255,
        maxMessage: "Le nom de l'image ne peut pas dépasser {{ limit }} caractères"
    )]
    private string $imagesU;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: Station::class, cascade: ["persist", "remove"])]
    private Collection $stations;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: ReservationTransport::class, cascade: ["remove"])]
    private Collection $reservations;

    #[ORM\OneToMany(mappedBy: "sender", targetEntity: Message::class, cascade: ["remove"])]
    private Collection $sentMessages;
    
    #[ORM\OneToMany(mappedBy: "receiver", targetEntity: Message::class, cascade: ["remove"])]
    private Collection $receivedMessages;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: SocialMedia::class)]
    private Collection $socialMedias;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: Commentaire::class, orphanRemoval: true)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->stations = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->sentMessages = new ArrayCollection();
        $this->receivedMessages = new ArrayCollection();
        $this->socialMedias = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    // Getters et Setters
    public function getIdU(): ?int
    {
        return $this->id_U;
    }
    

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getRoleUser(): string
    {
        return $this->roleUser;
    }

    public function setRoleUser(string $roleUser): self
    {
        $this->roleUser = $roleUser;
        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(?\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;
        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    public function getDiamond(): int
    {
        return $this->diamond;
    }

    public function setDiamond(int $diamond): self
    {
        $this->diamond = $diamond;
        return $this;
    }

    public function getDeleteFlag(): int
    {
        return $this->deleteFlag;
    }

    public function setDeleteFlag(int $deleteFlag): self
    {
        $this->deleteFlag = $deleteFlag;
        return $this;
    }

    public function getImagesU(): string
    {
        return $this->imagesU;
    }

    public function setImagesU(string $imagesU): self
    {
        $this->imagesU = $imagesU;
        return $this;
    }

     /**
     * @return Collection<int, Station>
     */
    public function getStations(): Collection
    {
        return $this->stations;
    }

    public function addStation(Station $station): self
    {
        if (!$this->stations->contains($station)) {
            $this->stations->add($station);
            $station->setUser($this);
        }

        return $this;
    }

    public function removeStation(Station $station): self
    {
        if ($this->stations->removeElement($station)) {
            if ($station->getUser() === $this) {
                $station->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationTransport>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(ReservationTransport $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setUser($this);
        }

        return $this;
    }

    public function removeReservation(ReservationTransport $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // Set the owning side to null (unless already changed)
            if ($reservation->getUser() === $this) {
                $reservation->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getSentMessages(): Collection
    {
        return $this->sentMessages;
    }

    public function addSentMessage(Message $message): self
    {
        if (!$this->sentMessages->contains($message)) {
            $this->sentMessages->add($message);
            $message->setSender($this);
        }

        return $this;
    }

    public function removeSentMessage(Message $message): self
    {
        if ($this->sentMessages->removeElement($message)) {
            // Définir le côté propriétaire à null (sauf si déjà modifié)
            if ($message->getSender() === $this) {
                $message->setSender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getReceivedMessages(): Collection
    {
        return $this->receivedMessages;
    }

    public function addReceivedMessage(Message $message): self
    {
        if (!$this->receivedMessages->contains($message)) {
            $this->receivedMessages->add($message);
            $message->setReceiver($this);
        }

        return $this;
    }

    public function removeReceivedMessage(Message $message): self
    {
        if ($this->receivedMessages->removeElement($message)) {
            // Définir le côté propriétaire à null (sauf si déjà modifié)
            if ($message->getReceiver() === $this) {
                $message->setReceiver(null);
            }
        }

        return $this;
    }

     /**
     * @return Collection<int, SocialMedia>
     */
    public function getSocialMedias(): Collection
    {
        return $this->socialMedias;
    }

    public function addSocialMedia(SocialMedia $socialMedia): self
    {
        if (!$this->socialMedias->contains($socialMedia)) {
            $this->socialMedias->add($socialMedia);
            $socialMedia->setUser($this);
        }

        return $this;
    }

    public function removeSocialMedia(SocialMedia $socialMedia): self
    {
        if ($this->socialMedias->removeElement($socialMedia)) {
            // Set the owning side to null (unless already changed)
            if ($socialMedia->getUser() === $this) {
                $socialMedia->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setUser($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // Set the owning side to null (unless already changed)
            if ($commentaire->getUser() === $this) {
                $commentaire->setUser(null);
            }
        }

        return $this;
    }

}
