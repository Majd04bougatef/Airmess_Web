<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: "users")]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_U", type: "integer")]
    private ?int $id_U = null; 

    #[ORM\Column(type: "string", length: 255)]
    private string $name;

    #[ORM\Column(type: "string", length: 255)]
    private string $prenom;

    #[ORM\Column(type: "string", length: 255, unique: true)]
    private string $email;

    #[ORM\Column(type: "string", length: 255)]
    private string $password;

    #[ORM\Column(name: "roleUser", type: "string", length: 50)]
    private string $roleUser;

    #[ORM\Column(name: "dateNaiss", type: "date")]
    private \DateTimeInterface $dateNaiss;

    #[ORM\Column(name: "phoneNumber", type: "string", length: 20)]
    private string $phoneNumber;

    #[ORM\Column(name: "statut", type: "string", length: 10)]
    private string $statut;

    #[ORM\Column(name: "diamond", type: "integer")]
    private int $diamond;

    #[ORM\Column(name: "deleteFlag", type: "integer")]
    private int $deleteFlag;

    #[ORM\Column(name: "imagesU", type: "string", length: 255)]
    private string $imagesU;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: Station::class, cascade: ["persist", "remove"])]
    private Collection $stations;

    public function __construct()
    {
        $this->stations = new ArrayCollection();
    }

    // Getters et Setters
    public function getId(): ?int
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

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
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

    public function getDateNaiss(): \DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(\DateTimeInterface $dateNaiss): self
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
}
