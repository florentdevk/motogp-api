<?php

namespace App\Entity;

use App\Repository\CircuitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CircuitRepository::class)]
class Circuit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $country;

    #[ORM\Column]
    private float $length;

    #[ORM\Column]
    private int $laps;

    /**
     * @var Collection<int, Race>
     */
    #[ORM\OneToMany(targetEntity: Race::class, mappedBy: 'circuit')]
    private Collection $races;

    public function __construct(
        string $name,
        string $country,
        float $length,
        int $laps,
    ) {
        $this->name = $name;
        $this->country = $country;
        $this->length = $length;
        $this->laps = $laps;
        $this->races = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function getLaps(): int
    {
        return $this->laps;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;
        return $this;
    }

    public function setLength(float $length): static
    {
        $this->length = $length;
        return $this;
    }

    public function setLaps(int $laps): static
    {
        $this->laps = $laps;
        return $this;
    }

    /**
     * @return Collection<int, Race>
     */
    public function getRaces(): Collection
    {
        return $this->races;
    }

    public function addRace(Race $race): static
    {
        if (!$this->races->contains($race)) {
            $this->races->add($race);
            $race->setCircuit($this);
        }

        return $this;
    }
}