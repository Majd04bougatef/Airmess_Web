#[ORM\Column(type: 'string', length: 20)]
private $status = 'pending';

public function getStatus(): ?string
{
    return $this->status;
}

public function setStatus(string $status): self
{
    $this->status = $status;
    return $this;
} 