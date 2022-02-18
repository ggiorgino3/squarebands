<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Photo;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = News::factory()
            ->count(15)
            ->create(
                ['status' => 'publish']
            );

            $news->each(
                function ($single_news) {
                    $photosNotRelatedToConcerts = Photo::whereNull('news_id')
                        ->whereNull('concert_id')
                        ->limit(3)
                        ->get();
                    $photosNotRelatedToConcerts->each(
                        function ($photo) use ($single_news) {
                            $single_news->photos()->save($photo);
                        }
                    );
                }
            );
    }
}
