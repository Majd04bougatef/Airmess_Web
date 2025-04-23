<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
#[ORM\Table(name: "messages")]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id", type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "sentMessages")]
    #[ORM\JoinColumn(name: "sender_id", referencedColumnName: "id_U", nullable: false)]
    private ?User $sender = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "receivedMessages")]
    #[ORM\JoinColumn(name: "receiver_id", referencedColumnName: "id_U", nullable: false)]
    private ?User $receiver = null;

    #[ORM\Column(name: "content", type: "text", options: ["collation" => "utf8mb4_general_ci"])]
    private string $content;

    #[ORM\Column(name: "dateM", type: "datetime")]
    private \DateTimeInterface $dateM;

    #[ORM\Column(name: "refRes", length: 255, nullable: true)]
    private ?string $refRes = null;

    public function __construct()
    {
        $this->dateM = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSender(): ?User
    {
        return $this->sender;
    }

    public function setSender(?User $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function getReceiver(): ?User
    {
        return $this->receiver;
    }

    public function setReceiver(?User $receiver): self
    {
        $this->receiver = $receiver;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getDateM(): \DateTimeInterface
    {
        return $this->dateM;
    }

    public function setDateM(\DateTimeInterface $dateM): self
    {
        $this->dateM = $dateM;
        return $this;
    }

    public function getRefRes(): ?string
    {
        return $this->refRes;
    }

    public function setRefRes(?string $refRes): static
    {
        $this->refRes = $refRes;

        return $this;
    }
}