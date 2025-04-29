<?php

namespace App\Entity;

use App\Repository\LiveStreamRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LiveStreamRepository::class)
 */
class LiveStream
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $streamId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $playbackId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $streamKey;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\Column(type="integer")
     */
    private $viewerCount = 0;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="liveStreams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStreamId(): ?string
    {
        return $this->streamId;
    }

    public function setStreamId(string $streamId): self
    {
        $this->streamId = $streamId;

        return $this;
    }

    public function getPlaybackId(): ?string
    {
        return $this->playbackId;
    }

    public function setPlaybackId(string $playbackId): self
    {
        $this->playbackId = $playbackId;

        return $this;
    }

    public function getStreamKey(): ?string
    {
        return $this->streamKey;
    }

    public function setStreamKey(string $streamKey): self
    {
        $this->streamKey = $streamKey;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeInterface $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeInterface
    {
        return $this->endedAt;
    }

    public function setEndedAt(?\DateTimeInterface $endedAt): self
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getViewerCount(): ?int
    {
        return $this->viewerCount;
    }

    public function setViewerCount(int $viewerCount): self
    {
        $this->viewerCount = $viewerCount;

        return $this;
    }

    public function incrementViewerCount(): self
    {
        $this->viewerCount++;

        return $this;
    }

    public function decrementViewerCount(): self
    {
        if ($this->viewerCount > 0) {
            $this->viewerCount--;
        }

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
} 