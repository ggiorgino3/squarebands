<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                UserSeeder::class,
                PhotoSeeder::class,
                AlbumSeeder::class,
                VideoSeeder::class,
                SongSeeder::class,
                NewsSeeder::class,
                ConcertSeeder::class,
                ConcertPhotoVideoSeeder::class,
                ContactSeeder::class,
            ]
        );
    }
}
