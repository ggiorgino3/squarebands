<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
   
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testVideos = array(
            "BigBuckBunny.mp4",
            "ElephantsDream.mp4",
            "ForBiggerBlazes.mp4",
            "ForBiggerEscapes.mp4",
            "ForBiggerFun.mp4",
            "ForBiggerJoyrides.mp4",
            "ForBiggerMeltdowns.mp4",
            "Sintel.mp4",
            "SubaruOutbackOnStreetAndDirt.mp4",
            "TearsOfSteel.mp4",
            "VolkswagenGTIReview.mp4",
            "WeAreGoingOnBullrun.mp4",
            "WhatCarCanYouGetForAGrand.mp4",
        );
        
        $videos = array();

        foreach ($testVideos as $testVideo) {
            $video_temp['name'] = "Video Test";
            $video_temp['description'] = "Video Test";
            $video_temp['uri'] = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/" . $testVideo;
            $videos[] = $video_temp;
        }
        Video::insert($videos);
    }
}
