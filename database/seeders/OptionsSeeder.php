<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = array(
            "band_name" => "Dream Theater",
            "band_country" => "America",
            "band_genre" => "Progressive Rock / Progressive Metal",
            "video_maximum_size" => "10", // mb
            "video_valid_extensions" => "avi,mp4",
            "photo_maximum_size" => "3", // mb
            "photo_valid_extensions" => "png,jpg,jpeg",
            "song_maximum_size" => "10", // mb
            "song_valid_extensions" => "mp3",
        );
        
        foreach ($options as $key => $value) {
            $options[] = array(
                'meta_key' => $key,
                'meta_value' => $value
            );
        }

        DB::table('options')->insert($options);
        DB::table('options')->insert(
            array('meta_key' => 'test',
            'meta_value' => 'test')
        );
    }
}
