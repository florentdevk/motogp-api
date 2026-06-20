<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{
    public const DUCATI_LENOVO = 'team_ducati_lenovo';
    public const APRILIA_RACING = 'team_aprilia_racing';
    public const MONSTER_YAMAHA = 'team_monster_yamaha';
    public const PRAMAC_YAMAHA = 'team_pramac_yamaha';
    public const RED_BULL_KTM = 'team_red_bull_ktm';
    public const TECH3_KTM = 'team_tech3_ktm';
    public const VR46 = 'team_vr46';
    public const GRESINI = 'team_gresini';
    public const TRACKHOUSE = 'team_trackhouse';
    public const HONDA_HRC = 'team_honda_hrc';
    public const LCR_HONDA = 'team_lcr_honda';

    public function load(ObjectManager $manager): void
    {
        $teams = [
            ['ref' => self::DUCATI_LENOVO, 'name' => 'Ducati Lenovo Team', 'country' => 'Italy', 'foundedYear' => 1999],
            ['ref' => self::APRILIA_RACING, 'name' => 'Aprilia Racing', 'country' => 'Italy', 'foundedYear' => 1968],
            ['ref' => self::MONSTER_YAMAHA, 'name' => 'Monster Energy Yamaha MotoGP', 'country' => 'Japan', 'foundedYear' => 1999],
            ['ref' => self::PRAMAC_YAMAHA, 'name' => 'Prima Pramac Yamaha', 'country' => 'Italy', 'foundedYear' => 2002],
            ['ref' => self::RED_BULL_KTM, 'name' => 'Red Bull KTM Factory Racing', 'country' => 'Austria', 'foundedYear' => 2014],
            ['ref' => self::TECH3_KTM, 'name' => 'Red Bull KTM Tech3', 'country' => 'France', 'foundedYear' => 1990],
            ['ref' => self::VR46, 'name' => 'Pertamina Enduro VR46 Racing Team', 'country' => 'Italy', 'foundedYear' => 2014],
            ['ref' => self::GRESINI, 'name' => 'BK8 Gresini Racing', 'country' => 'Italy', 'foundedYear' => 1997],
            ['ref' => self::TRACKHOUSE, 'name' => 'Trackhouse MotoGP Team', 'country' => 'United States', 'foundedYear' => 2023],
            ['ref' => self::HONDA_HRC, 'name' => 'Honda HRC Castrol', 'country' => 'Japan', 'foundedYear' => 1982],
            ['ref' => self::LCR_HONDA, 'name' => 'Castrol Honda LCR', 'country' => 'Monaco', 'foundedYear' => 1996],
        ];

        foreach ($teams as $data) {
            $team = new Team($data['name'], $data['country'], $data['foundedYear']);
            $manager->persist($team);
            $this->addReference($data['ref'], $team);
        }

        $manager->flush();
    }
}
