#!/bin/bash
echo ""
echo ""
echo ""
echo ""
echo "###################################################################";
echo "#                                                                 #"
echo "#  Running installation of third part dependencies with Composer  #";
echo "#                                                                 #"
echo "###################################################################";
sleep 2;
composer i
echo ""
echo ""
echo ""
echo ""
echo "#######################################################################";
echo "#                                                                     #"
echo "#  Running installation of FRONTEND third part dependencies with npm  #";
echo "#                                                                     #"
echo "#######################################################################";
sleep 2
npm i
echo ""
echo ""
echo ""
echo ""
echo "#######################################################################";
echo "#                                                                     #"
echo "#          Compiling all the assets that need to build...             #";
echo "#                                                                     #"
echo "#######################################################################";
echo ""
sleep 2
npm run dev
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

sail artisan migrate

echo "DB::table('options')->insert(array('meta_key' => 'band_name', 'meta_value' => 'Dream Theater'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'band_country', 'meta_value' => 'America'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'band_genre', 'meta_value' => 'Progressive Rock / Progressive Metal'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'video_maximum_size', 'meta_value' => '10'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'video_valid_extensions', 'meta_value' => 'avi,mp4'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'photo_maximum_size', 'meta_value' => '3'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'photo_valid_extensions', 'meta_value' => 'png,jpg,jpeg'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'song_maximum_size', 'meta_value' => '10'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'song_valid_extensions', 'meta_value' => 'mp3'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'fb_link', 'meta_value' => 'https://facebook.com/dreamtheater'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'ig_link', 'meta_value' => 'https://instagram.com/dreamtheaterofficial'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'spotify_url', 'meta_value' => 'https://open.spotify.com/artist/2aaLAng2L2aWD2FClzwiep'));" | sail tinker
echo "DB::table('options')->insert(array('meta_key' => 'yt_channel', 'meta_value' => 'https://youtube.com/dreamtheater'));" | sail tinker
