<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\ORM\Mapping as ORM;

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

    public function __construct(
        string $name,
        string $country,
        int $foundedYear,
    ) {
        $this->name = $name;
        $this->country = $country;
        $this->foundedYear = $foundedYear;
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
}