<?php

namespace App\DataFixtures;

use App\Entity\Circuit;
use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RaceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $races = [
            ['name' => 'PT Grand Prix of Thailand', 'date' => '2026-03-01', 'season' => 2026, 'circuit' => CircuitFixtures::BURIRAM],
            ['name' => 'Estrella Galicia 0,0 Grand Prix of Brazil', 'date' => '2026-03-22', 'season' => 2026, 'circuit' => CircuitFixtures::GOIANIA],
            ['name' => 'Red Bull Grand Prix of the United States', 'date' => '2026-03-29', 'season' => 2026, 'circuit' => CircuitFixtures::COTA],
            ['name' => 'Estrella Galicia 0,0 Grand Prix of Spain', 'date' => '2026-04-26', 'season' => 2026, 'circuit' => CircuitFixtures::JEREZ],
            ['name' => 'Michelin Grand Prix of France', 'date' => '2026-05-10', 'season' => 2026, 'circuit' => CircuitFixtures::LE_MANS],
            ['name' => 'Monster Energy Grand Prix of Catalunya', 'date' => '2026-05-17', 'season' => 2026, 'circuit' => CircuitFixtures::BARCELONA],
            ['name' => 'Brembo Grand Prix of Italy', 'date' => '2026-05-31', 'season' => 2026, 'circuit' => CircuitFixtures::MUGELLO],
            ['name' => 'Grand Prix of Hungary', 'date' => '2026-06-07', 'season' => 2026, 'circuit' => CircuitFixtures::BALATON],
            ['name' => 'Monster Energy Grand Prix of Czechia', 'date' => '2026-06-21', 'season' => 2026, 'circuit' => CircuitFixtures::BRNO],
            ['name' => 'Tissot Grand Prix of the Netherlands', 'date' => '2026-06-28', 'season' => 2026, 'circuit' => CircuitFixtures::ASSEN],
            ['name' => 'Liqui-Moly Grand Prix of Germany', 'date' => '2026-07-12', 'season' => 2026, 'circuit' => CircuitFixtures::SACHSENRING],
            ['name' => 'Qatar Airways Grand Prix of Great Britain', 'date' => '2026-08-09', 'season' => 2026, 'circuit' => CircuitFixtures::SILVERSTONE],
            ['name' => 'Grand Prix of Aragon', 'date' => '2026-08-30', 'season' => 2026, 'circuit' => CircuitFixtures::ARAGON],
            ['name' => 'Red Bull Grand Prix of San Marino and the Rimini Riviera', 'date' => '2026-09-13', 'season' => 2026, 'circuit' => CircuitFixtures::MISANO],
            ['name' => 'Grand Prix of Austria', 'date' => '2026-09-20', 'season' => 2026, 'circuit' => CircuitFixtures::RED_BULL_RING],
            ['name' => 'Motul Grand Prix of Japan', 'date' => '2026-10-04', 'season' => 2026, 'circuit' => CircuitFixtures::MOTEGI],
            ['name' => 'Pertamina Grand Prix of Indonesia', 'date' => '2026-10-11', 'season' => 2026, 'circuit' => CircuitFixtures::MANDALIKA],
            ['name' => 'Grand Prix of Australia', 'date' => '2026-10-25', 'season' => 2026, 'circuit' => CircuitFixtures::PHILLIP_ISLAND],
            ['name' => 'Petronas Grand Prix of Malaysia', 'date' => '2026-11-01', 'season' => 2026, 'circuit' => CircuitFixtures::SEPANG],
            ['name' => 'Qatar Airways Grand Prix of Qatar', 'date' => '2026-11-08', 'season' => 2026, 'circuit' => CircuitFixtures::LOSAIL],
            ['name' => 'Repsol Grand Prix of Portugal', 'date' => '2026-11-22', 'season' => 2026, 'circuit' => CircuitFixtures::PORTIMAO],
            ['name' => 'Motul Grand Prix of Valencia', 'date' => '2026-11-29', 'season' => 2026, 'circuit' => CircuitFixtures::VALENCIA],
        ];

        foreach ($races as $data) {
            /** @var Circuit $circuit */
            $circuit = $this->getReference($data['circuit'], Circuit::class);

            $race = new Race(
                $data['name'],
                new \DateTimeImmutable($data['date']),
                $data['season'],
                $circuit,
            );

            $manager->persist($race);
            $this->addReference('race_'.$data['name'], $race);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [CircuitFixtures::class];
    }
}
