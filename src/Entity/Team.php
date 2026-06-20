<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
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
    private int $foundedYear;

    /**
     * @var Collection<int, Rider>
     */
    #[ORM\OneToMany(targetEntity: Rider::class, mappedBy: 'team')]
    private Collection $riders;

    public function __construct(
        string $name,
        string $country,
        int $foundedYear,
    ) {
        $this->name = $name;
        $this->country = $country;
        $this->foundedYear = $foundedYear;
        $this->riders = new ArrayCollection();
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

    public function getFoundedYear(): int
    {
        return $this->foundedYear;
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

    public function setFoundedYear(int $foundedYear): static
    {
        $this->foundedYear = $foundedYear;
        return $this;
    }

    /**
     * @return Collection<int, Rider>
     */
    public function getRiders(): Collection
    {
        return $this->riders;
    }

    public function addRider(Rider $rider): static
    {
        if (!$this->riders->contains($rider)) {
            $this->riders->add($rider);
            $rider->setTeam($this);
        }

        return $this;
    }
}