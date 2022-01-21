<?php

namespace Database\Seeders;

use App\Models\Concert;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Database\Seeder;

class ConcertPhotoVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Concert::all()->each(
            function ($concert) {
                $photos = Photo::inRandomOrder()->limit(5)->get();
                $videos = Video::inRandomOrder()->limit(5)->get();
                $photos->each(
                    function ($photo) use ($concert) {
                        $concert->photos()->save($photo);
                    }
                );
                $videos->each(
                    function ($video) use ($concert) {
                        $concert->videos()->save($video);
                    }
                );
            }
        );
    }
}
