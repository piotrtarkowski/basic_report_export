<?php

namespace App\DataFixtures;

use App\Entity\ExportHistory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppExportHistoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $exportHistoryData = [
            [
                'name' => 'Eksport 1',
                'exportAt' => '2019-11-29 19:05:43',
                'user' => 'Jan',
                'place' => 'Biuro 1'
            ],
            [
                'name' => 'Eksport 2',
                'exportAt' => '2018-06-02 14:55:55',
                'user' => 'Piotr',
                'place' => 'Biuro 1'
            ],
            [
                'name' => 'Eksport 3',
                'exportAt' => '2019-04-15 08:25:15',
                'user' => 'Zenon',
                'place' => 'Biuro 1'
            ],
            [
                'name' => 'Eksport 4',
                'exportAt' => '2020-01-02 20:05:16',
                'user' => 'Gerwazy',
                'place' => 'Biuro 2'
            ]
        ];

        foreach ($exportHistoryData as $export) {
            $exportHistory = new ExportHistory();
            $exportHistory->setName($export['name']);
            $exportHistory->setExportAt(new \DateTime($export['exportAt']));
            $exportHistory->setUser($export['user']);
            $exportHistory->setPlace($export['place']);
            $manager->persist($exportHistory);
        }

        $manager->flush();
    }
}
