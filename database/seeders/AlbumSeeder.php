<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Song;
use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        $someAlbums = array(
            array(
                'title' => "Black Clouds & Silver Linings",
                "description" => $this->faker->text(),
                'genre' => "Progressive Metal",
                'publish_date' => '2009-06-23'
            ),
            array(
                'name' => "The Astonishing",
                "description" => $this->faker->text(),
                'genre' => "Progressive Metal",
                'publish_date' => '2016-01-29'
            ),
        );

        DB::table('albums')->insert($someAlbums);
        Album::all()->each(
            function ($album) {
                $songsNotRelatedToAlbum = Song::whereNull('album_id')
                    ->limit(5)
                    ->get();
                $songsNotRelatedToAlbum->each(
                    function ($song) use ($album) {
                        $album->songs()->save($song);
                    }
                );
            }
        );
    }
}
