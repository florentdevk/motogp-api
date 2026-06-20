<?php

namespace App\Entity;

use App\Repository\RaceResultRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaceResultRepository::class)]
class RaceResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private int $position;

    #[ORM\Column]
    private float $points;

    #[ORM\Column]
    private bool $fastestLap;

    #[ORM\ManyToOne(inversedBy: 'raceResults')]
    #[ORM\JoinColumn(nullable: false)]
    private Rider $rider;

    #[ORM\ManyToOne(inversedBy: 'raceResults')]
    #[ORM\JoinColumn(nullable: false)]
    private Race $race;

    public function __construct(
        int $position,
        float $points,
        bool $fastestLap,
        Rider $rider,
        Race $race,
    ) {
        $this->position = $position;
        $this->points = $points;
        $this->fastestLap = $fastestLap;
        $this->rider = $rider;
        $this->race = $race;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getPoints(): float
    {
        return $this->points;
    }

    public function isFastestLap(): bool
    {
        return $this->fastestLap;
    }

    public function getRider(): Rider
    {
        return $this->rider;
    }

    public function getRace(): Race
    {
        return $this->race;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;
        return $this;
    }

    public function setPoints(float $points): static
    {
        $this->points = $points;
        return $this;
    }

    public function setFastestLap(bool $fastestLap): static
    {
        $this->fastestLap = $fastestLap;
        return $this;
    }

    public function setRider(Rider $rider): static
    {
        $this->rider = $rider;
        return $this;
    }

    public function setRace(Race $race): static
    {
        $this->race = $race;
        return $this;
    }
}