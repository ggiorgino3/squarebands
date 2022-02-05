<?php

namespace Database\Seeders;

use App\Models\Photo;
use Http;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "https://picsum.photos/v2/list";
        $res = Http::get($url);

        $photos = $res->json();
        $new_photos = array();

        foreach ($photos as $photo) {
            $temp = array(
                'uri' => $photo['download_url'],
                'name' => $photo['author'],
                'description' => $photo['author'],
                'caption' => $photo['author'],
            );
            $new_photos[] = $temp;
        }
        Photo::insert($new_photos);
    }
}
