<?php

namespace App\DataFixtures;

use App\Entity\Rider;
use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RiderFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $riders = [
            // Ducati Lenovo Team
            ['name' => 'Francesco Bagnaia', 'nationality' => 'Italian', 'number' => 63, 'birthdate' => '1997-01-14', 'team' => TeamFixtures::DUCATI_LENOVO],
            ['name' => 'Marc Marquez', 'nationality' => 'Spanish', 'number' => 93, 'birthdate' => '1993-02-17', 'team' => TeamFixtures::DUCATI_LENOVO],
            // Aprilia Racing
            ['name' => 'Jorge Martin', 'nationality' => 'Spanish', 'number' => 89, 'birthdate' => '1998-01-29', 'team' => TeamFixtures::APRILIA_RACING],
            ['name' => 'Marco Bezzecchi', 'nationality' => 'Italian', 'number' => 72, 'birthdate' => '1998-11-12', 'team' => TeamFixtures::APRILIA_RACING],
            // Monster Energy Yamaha
            ['name' => 'Fabio Quartararo', 'nationality' => 'French', 'number' => 20, 'birthdate' => '1999-04-20', 'team' => TeamFixtures::MONSTER_YAMAHA],
            ['name' => 'Alex Rins', 'nationality' => 'Spanish', 'number' => 42, 'birthdate' => '1995-12-08', 'team' => TeamFixtures::MONSTER_YAMAHA],
            // Prima Pramac Yamaha
            ['name' => 'Toprak Razgatlioglu', 'nationality' => 'Turkish', 'number' => 7, 'birthdate' => '1996-10-16', 'team' => TeamFixtures::PRAMAC_YAMAHA],
            ['name' => 'Jack Miller', 'nationality' => 'Australian', 'number' => 43, 'birthdate' => '1995-01-18', 'team' => TeamFixtures::PRAMAC_YAMAHA],
            // Red Bull KTM Factory Racing
            ['name' => 'Pedro Acosta', 'nationality' => 'Spanish', 'number' => 37, 'birthdate' => '2004-05-25', 'team' => TeamFixtures::RED_BULL_KTM],
            ['name' => 'Brad Binder', 'nationality' => 'South African', 'number' => 33, 'birthdate' => '1995-08-11', 'team' => TeamFixtures::RED_BULL_KTM],
            // Red Bull KTM Tech3
            ['name' => 'Maverick Vinales', 'nationality' => 'Spanish', 'number' => 12, 'birthdate' => '1995-01-12', 'team' => TeamFixtures::TECH3_KTM],
            ['name' => 'Enea Bastianini', 'nationality' => 'Italian', 'number' => 23, 'birthdate' => '1997-12-30', 'team' => TeamFixtures::TECH3_KTM],
            // Pertamina Enduro VR46
            ['name' => 'Fabio Di Giannantonio', 'nationality' => 'Italian', 'number' => 49, 'birthdate' => '1998-10-10', 'team' => TeamFixtures::VR46],
            ['name' => 'Franco Morbidelli', 'nationality' => 'Italian', 'number' => 21, 'birthdate' => '1994-12-04', 'team' => TeamFixtures::VR46],
            // BK8 Gresini Racing
            ['name' => 'Alex Marquez', 'nationality' => 'Spanish', 'number' => 73, 'birthdate' => '1996-04-23', 'team' => TeamFixtures::GRESINI],
            ['name' => 'Fermin Aldeguer', 'nationality' => 'Spanish', 'number' => 54, 'birthdate' => '2005-04-05', 'team' => TeamFixtures::GRESINI],
            // Trackhouse MotoGP Team
            ['name' => 'Raul Fernandez', 'nationality' => 'Spanish', 'number' => 25, 'birthdate' => '2000-10-23', 'team' => TeamFixtures::TRACKHOUSE],
            ['name' => 'Ai Ogura', 'nationality' => 'Japanese', 'number' => 79, 'birthdate' => '2001-01-26', 'team' => TeamFixtures::TRACKHOUSE],
            // Honda HRC Castrol
            ['name' => 'Luca Marini', 'nationality' => 'Italian', 'number' => 10, 'birthdate' => '1997-08-10', 'team' => TeamFixtures::HONDA_HRC],
            ['name' => 'Joan Mir', 'nationality' => 'Spanish', 'number' => 36, 'birthdate' => '1997-09-01', 'team' => TeamFixtures::HONDA_HRC],
            // Castrol Honda LCR
            ['name' => 'Johann Zarco', 'nationality' => 'French', 'number' => 5, 'birthdate' => '1990-07-16', 'team' => TeamFixtures::LCR_HONDA],
            ['name' => 'Diogo Moreira', 'nationality' => 'Brazilian', 'number' => 11, 'birthdate' => '2004-04-23', 'team' => TeamFixtures::LCR_HONDA],
        ];

        foreach ($riders as $data) {
            /** @var Team $team */
            $team = $this->getReference($data['team'], Team::class);

            $rider = new Rider(
                $data['name'],
                $data['nationality'],
                $data['number'],
                new \DateTimeImmutable($data['birthdate']),
                $team,
            );

            $manager->persist($rider);
            $this->addReference('rider_'.$data['number'], $rider);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [TeamFixtures::class];
    }
}
