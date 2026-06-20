<?php

namespace App\Entity;

use App\Repository\RiderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: RiderRepository::class)]
class Rider
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $nationality;

    #[ORM\Column]
    private int $number;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private \DateTimeImmutable $birthdate;

    #[ORM\ManyToOne(inversedBy: 'riders')]
    #[ORM\JoinColumn(nullable: false)]
    private Team $team;

    /**
     * @var Collection<int, RaceResult>
     */
    #[ORM\OneToMany(targetEntity: RaceResult::class, mappedBy: 'rider')]
    private Collection $raceResults;

    public function __construct(
        string $name,
        string $nationality,
        int $number,
        \DateTimeImmutable $birthdate,
        Team $team,
    ) {
        $this->name = $name;
        $this->nationality = $nationality;
        $this->number = $number;
        $this->birthdate = $birthdate;
        $this->team = $team;
        $this->raceResults = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNationality(): string
    {
        return $this->nationality;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getBirthdate(): \DateTimeImmutable
    {
        return $this->birthdate;
    }

    public function getTeam(): Team
    {
        return $this->team;
    }

    /**
     * @return Collection<int, RaceResult>
     */
    public function getRaceResults(): Collection
    {
        return $this->raceResults;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function setNationality(string $nationality): static
    {
        $this->nationality = $nationality;
        return $this;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;
        return $this;
    }

    public function setBirthdate(\DateTimeImmutable $birthdate): static
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function setTeam(Team $team): static
    {
        $this->team = $team;
        return $this;
    }

    public function addRaceResult(RaceResult $raceResult): static
    {
        if (!$this->raceResults->contains($raceResult)) {
            $this->raceResults->add($raceResult);
            $raceResult->setRider($this);
        }

        return $this;
    }
}