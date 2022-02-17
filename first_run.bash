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
sail artisan storage:link

echo "DB::table('options')->insert(array('visible_on_frontend' => '1', 'title' => 'Band Name', 'meta_key' => 'band_name', 'meta_value' => 'Dream Theater'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '1', 'title' => 'Band Country', 'meta_key' => 'band_country', 'meta_value' => 'America'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '1', 'title' => 'Band Genre', 'meta_key' => 'band_genre', 'meta_value' => 'Progressive Rock / Progressive Metal'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '1', 'title' => 'Band Biography', 'meta_key' => 'bio', 'meta_value' => 'Dream Theater is a two-time Grammy nominated progressive metal band from New York City. The band was formed in 1985 by guitarist John Petrucci, drummer Mike Portnoy and bassist John Myung while they attended the Berklee College of Music in Boston, Massachusetts. Current band members are guitarist John Petrucci, bassist John Myung, singer James LaBrie, keyboardist Jordan Rudess and drummer Mike Mangini. Past members include Mike Portnoy, Derek Sherinian, Kevin Moore and Charlie Dominici. Dream Theater made their debut in 1989 with \"When Dream and Day Unite\" and has so far released 15 studio albums, including two concept albums - \"Metropolis Pt. 2: Scenes from a Memory\" (1999) and \"The Astonishing\" (2016). Along with Queensrÿche and Fates Warning, Dream Theater are the pioneers of the progressive metal genre that developed in the late 1980s. With their unique style, majestic instrumental skills, and deep-rooted professionalism, they are considered one of the most influential, innovative and successful prog bands of all time.'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '1', 'title' => 'John Petrucci', 'meta_key' => 'jp_description', 'meta_value' => 'John Peter Petrucci (born July 12, 1967) is an American guitarist, composer and producer. He is best known as a founding member of the progressive metal band Dream Theater. He produced or co-produced (often with former member Mike Portnoy before he departed the band in 2010) all of Dream Theater\'s albums from Metropolis Pt. 2: Scenes from a Memory (1999) to A View from the Top of the World (2021), and has been the sole producer of the band\'s albums released since A Dramatic Turn of Events (2011). Petrucci has also released two solo albums: Suspended Animation (2005) and Terminal Velocity (2020).'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '1', 'title' => 'James Labrie', 'meta_key' => 'jl_description', 'meta_value' => 'Kevin James LaBrie (born May 5, 1963) is a Canadian singer and songwriter, best known as the lead singer of American progressive metal band Dream Theater, which he has been fronting since 1991.\nKevin James LaBrie was born in Penetanguishene, Ontario, Canada and started playing drums at age five. By his mid-teens, he was a member of several bands as a front man that attempted singing and/or drumming. He stopped playing drums at age 17 and in 1981, at age 18, he moved to Toronto.'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '1', 'title' => 'Jordan Rudess', 'meta_key' => 'jr_description', 'meta_value' => 'Jordan Rudess (born Jordan Charles Rudes;\nNovember 4, 1956) is an American keyboardist and composer best known as a member of the progressive metal band Dream Theater and the progressive metal supergroup Liquid Tension Experiment.\nJordan Rudess was born in 1956 into a Jewish family. He was recognized by his 2nd grade teacher for his piano playing and was immediately given professional instruction. At nine, he entered the Juilliard School of Music Pre-College Division for classical piano training, but by his late teens he had grown increasingly interested in synthesizers and progressive rock music, citing his very first experience in the genre as the Hammond playing and distorted stylistic expression of Jon Lord. Against the counsel of his parents and tutors, he turned away from classical piano and tried his hand as a solo progressive rock keyboardist.'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '1', 'title' => 'John Myung', 'meta_key' => 'jm_description', 'meta_value' => 'John Ro Myung (born January 24, 1967) is a Korean American bassist and a founding member of the progressive metal group Dream Theater.\nBorn in Chicago to Korean parents, Myung grew up with John Petrucci on Long Island. After taking violin lessons from the age of five, he started playing bass guitar at fifteen. After graduating from high school, he and Petrucci enrolled at the Berklee College of Music, where they met Mike Portnoy. The trio became the nucleus of Dream Theater, which became Myung\'s primary professional focus.\n\n'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '1', 'title' => 'Mike Mangini', 'meta_key' => 'mm_description', 'meta_value' => 'Michael Mangini (born April 18, 1963) is an American musician and songwriter best known as the current drummer of the progressive metal band Dream Theater. He has also played for bands and artists such as Annihilator, Extreme, James LaBrie, and Steve Vai. Before joining Dream Theater, Mangini was a faculty member at Berklee College of Music.[1] Between 2002 and 2005, he set five World\'s Fastest Drummer records. Mangini appeared on the Discovery Channel show Time Warp, displaying his drum skills for high-speed cameras.'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'video_maximum_size', 'meta_value' => '10'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'video_valid_extensions', 'meta_value' => 'avi,mp4'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'photo_maximum_size', 'meta_value' => '3'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'photo_valid_extensions', 'meta_value' => 'png,jpg,jpeg'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'song_maximum_size', 'meta_value' => '10'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'song_valid_extensions', 'meta_value' => 'mp3'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'fb_link', 'meta_value' => 'https://facebook.com/dreamtheater'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'ig_link', 'meta_value' => 'https://instagram.com/dreamtheaterofficial'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'spotify_url', 'meta_value' => 'https://open.spotify.com/artist/2aaLAng2L2aWD2FClzwiep'));" | sail tinker
echo "DB::table('options')->insert(array('visible_on_frontend' => '0', 'title' => '', 'meta_key' => 'yt_channel', 'meta_value' => 'https://youtube.com/dreamtheater'));" | sail tinker