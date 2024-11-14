<?php

namespace Danilocgsilva\PayloadPanacea\Entity;

use Danilocgsilva\PayloadPanacea\Repository\FieldRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FieldRepository::class)]
class Field
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $value = null;

    /**
     * @var Collection<int, Payload>
     */
    #[ORM\OneToMany(targetEntity: Payload::class, mappedBy: 'fields')]
    private Collection $payloads;

    public function __construct()
    {
        $this->payloads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return Collection<int, Payload>
     */
    public function getPayloads(): Collection
    {
        return $this->payloads;
    }

    public function addPayload(Payload $payload): static
    {
        if (!$this->payloads->contains($payload)) {
            $this->payloads->add($payload);
            $payload->setFields($this);
        }

        return $this;
    }

    public function removePayload(Payload $payload): static
    {
        if ($this->payloads->removeElement($payload)) {
            // set the owning side to null (unless already changed)
            if ($payload->getFields() === $this) {
                $payload->setFields(null);
            }
        }

        return $this;
    }
}
