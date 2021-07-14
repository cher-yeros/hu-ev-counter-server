<?php

use Illuminate\Database\Seeder;

use App\Tesebaki;
// use App\Sebaki;

class SebakiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sebakis = factory(\App\Sebaki::class,10)->create();
        $sebakis->each(function($sebaki){
            factory(Tesebaki::class,50)->create(['sebaki_id' => $sebaki->id]);
        });
    }
}
