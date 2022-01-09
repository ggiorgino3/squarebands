<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $someConcerts = array(
            array(
                'name' => "Top Of The World Tour - Rome",
                'place_name' => "Palazzo dello sport",
                'place_address' => "Piazzale Pier Luigi Nervi, 1, 00144 Roma RM",
                'country_name' => "Italy",
                'city_name' => "Rome",
                'datetime' => "2022-05-06 20:30:00",
                'gate_opening' => "18:30:00",
            ),
            array(
                'name' => "Top Of The World Tour - Milan",
                'place_name' => "Mediolanum Forum",
                'place_address' => "Via Giuseppe di Vittorio, 6, 20090 Assago MI",
                'country_name' => "Italy",
                'city_name' => "Milan",
                'datetime' => "2022-05-07 20:30:00",
                'gate_opening' => "18:30:00",
            ),
            array(
                'name' => "Top Of The World Tour - Padova",
                'place_name' => "Kioene Arena",
                'place_address' => "Via S. Marco, 53, 35129 Padova PD",
                'country_name' => "Italy",
                'city_name' => "Padova",
                'datetime' => "2022-05-08 20:30:00",
                'gate_opening' => "18:30:00",
            ),
        );
        
        DB::table('concerts')->insert($someConcerts);
    }
}
