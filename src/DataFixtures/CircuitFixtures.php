<?php

namespace App\DataFixtures;

use App\Entity\Circuit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CircuitFixtures extends Fixture
{
    public const BURIRAM = 'circuit_buriram';
    public const GOIANIA = 'circuit_goiania';
    public const COTA = 'circuit_cota';
    public const JEREZ = 'circuit_jerez';
    public const LE_MANS = 'circuit_le_mans';
    public const BARCELONA = 'circuit_barcelona';
    public const MUGELLO = 'circuit_mugello';
    public const BALATON = 'circuit_balaton';
    public const BRNO = 'circuit_brno';
    public const ASSEN = 'circuit_assen';
    public const SACHSENRING = 'circuit_sachsenring';
    public const SILVERSTONE = 'circuit_silverstone';
    public const ARAGON = 'circuit_aragon';
    public const MISANO = 'circuit_misano';
    public const RED_BULL_RING = 'circuit_red_bull_ring';
    public const MOTEGI = 'circuit_motegi';
    public const MANDALIKA = 'circuit_mandalika';
    public const PHILLIP_ISLAND = 'circuit_phillip_island';
    public const SEPANG = 'circuit_sepang';
    public const LOSAIL = 'circuit_losail';
    public const PORTIMAO = 'circuit_portimao';
    public const VALENCIA = 'circuit_valencia';

    public function load(ObjectManager $manager): void
    {
        $circuits = [
            ['ref' => self::BURIRAM, 'name' => 'Chang International Circuit', 'country' => 'Thailand', 'length' => 4.554, 'laps' => 26],
            ['ref' => self::GOIANIA, 'name' => 'Autódromo Internacional Ayrton Senna', 'country' => 'Brazil', 'length' => 4.100, 'laps' => 25],
            ['ref' => self::COTA, 'name' => 'Circuit of The Americas', 'country' => 'United States', 'length' => 5.513, 'laps' => 20],
            ['ref' => self::JEREZ, 'name' => 'Circuito de Jerez - Angel Nieto', 'country' => 'Spain', 'length' => 4.423, 'laps' => 25],
            ['ref' => self::LE_MANS, 'name' => 'Circuit Bugatti', 'country' => 'France', 'length' => 4.185, 'laps' => 27],
            ['ref' => self::BARCELONA, 'name' => 'Circuit de Barcelona-Catalunya', 'country' => 'Spain', 'length' => 4.657, 'laps' => 24],
            ['ref' => self::MUGELLO, 'name' => 'Autodromo Internazionale del Mugello', 'country' => 'Italy', 'length' => 5.245, 'laps' => 23],
            ['ref' => self::BALATON, 'name' => 'Balaton Park Circuit', 'country' => 'Hungary', 'length' => 4.200, 'laps' => 25],
            ['ref' => self::BRNO, 'name' => 'Automotodrom Brno', 'country' => 'Czech Republic', 'length' => 5.403, 'laps' => 22],
            ['ref' => self::ASSEN, 'name' => 'TT Circuit Assen', 'country' => 'Netherlands', 'length' => 4.542, 'laps' => 26],
            ['ref' => self::SACHSENRING, 'name' => 'Sachsenring', 'country' => 'Germany', 'length' => 3.671, 'laps' => 30],
            ['ref' => self::SILVERSTONE, 'name' => 'Silverstone Circuit', 'country' => 'United Kingdom', 'length' => 5.900, 'laps' => 20],
            ['ref' => self::ARAGON, 'name' => 'MotorLand Aragón', 'country' => 'Spain', 'length' => 5.077, 'laps' => 23],
            ['ref' => self::MISANO, 'name' => 'Misano World Circuit Marco Simoncelli', 'country' => 'Italy', 'length' => 4.226, 'laps' => 27],
            ['ref' => self::RED_BULL_RING, 'name' => 'Red Bull Ring', 'country' => 'Austria', 'length' => 4.318, 'laps' => 28],
            ['ref' => self::MOTEGI, 'name' => 'Mobility Resort Motegi', 'country' => 'Japan', 'length' => 4.801, 'laps' => 24],
            ['ref' => self::MANDALIKA, 'name' => 'Pertamina Mandalika International Circuit', 'country' => 'Indonesia', 'length' => 4.314, 'laps' => 27],
            ['ref' => self::PHILLIP_ISLAND, 'name' => 'Phillip Island Grand Prix Circuit', 'country' => 'Australia', 'length' => 4.448, 'laps' => 27],
            ['ref' => self::SEPANG, 'name' => 'Petronas Sepang International Circuit', 'country' => 'Malaysia', 'length' => 5.543, 'laps' => 20],
            ['ref' => self::LOSAIL, 'name' => 'Lusail International Circuit', 'country' => 'Qatar', 'length' => 5.380, 'laps' => 22],
            ['ref' => self::PORTIMAO, 'name' => 'Autodromo Internacional do Algarve', 'country' => 'Portugal', 'length' => 4.592, 'laps' => 25],
            ['ref' => self::VALENCIA, 'name' => 'Circuit Ricardo Tormo', 'country' => 'Spain', 'length' => 4.005, 'laps' => 27],
        ];

        foreach ($circuits as $data) {
            $circuit = new Circuit(
                $data['name'],
                $data['country'],
                $data['length'],
                $data['laps'],
            );

            $manager->persist($circuit);
            $this->addReference($data['ref'], $circuit);
        }

        $manager->flush();
    }
}