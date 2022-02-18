<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Song;

use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = array(
            'larks_tongue',
            'new_life',
            'now_or_never',
            'ouverture',
            'start_of_future',
            'strange_dejavu',
            'wither',
            'wonderful_stranging'
        );
        foreach ($songs as $song) {
            $song = Song::factory()
                ->create(
                    [
                        'uri' => asset("storage/songs/$song.mp3")
                    ]
                );
            Album::inRandomOrder()->first()->songs()->save($song);
        }
    }
}
