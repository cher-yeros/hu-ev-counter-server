<?php

use Illuminate\Database\Seeder;
use App\Campus;
use Illuminate\Support\Str;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $campuses = [
            [
            'abbrev' => 'HWU',
            'name' => 'Hawassa University'
            ],
//            [
//                'abbrev' => 'AAU',
//                'name' => 'Addis Abeba University'
//            ],
//            [
//                'abbrev' => 'JU',
//                'name' => 'Jimma University'
//            ]

        ];
        foreach($campuses as $campus) {
            Campus::create([
                'slug' =>Str::slug($campus['name']),
                'abbrev' => $campus['abbrev'],
                'name' => $campus['name']
            ]);
        }
        // Campus::create([
        //     'abbrev' => 'HWU',
        //     'name' => 'Hawassa University'
        // ]);
        // Campus::create([
        //     'abbrev' => 'AAU',
        //     'name' => 'Addis Abeba University'
        // ]);
        // Campus::create([
        //     'abbrev' => 'JU',
        //     'name' => 'Jimma University'
        // ]);
    }
}
