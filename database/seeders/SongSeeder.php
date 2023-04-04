<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;
use Faker\Generator as Faker;


class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $new_song = new Song;

        $new_song->title = "It's my life";
        $new_song->album = "Crush";
        $new_song->author = "Bon Jovi";
        $new_song->editor = "Island";
        $new_song->length = "03:46";
        $new_song->poster = "https://i.discogs.com/8i-yndKeW1g-yE7Ro9MXhy2A75LVT4lUcIvPACKq6DM/rs:fit/g:sm/q:90/h:523/w:600/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTY3OTU4/NDEtMTQyNjc5NDc5/My03NDY2LmpwZWc.jpeg";

        $new_song->save();


        $new_song = new Song;

        $new_song->title = "Numb";
        $new_song->album = "Meteora";
        $new_song->author = "Linkin Park";
        $new_song->editor = "Warner Bros";
        $new_song->length = "03:06";
        $new_song->poster = "https://pics.filmaffinity.com/linkin_park_numb-732038016-large.jpg";

        $new_song->save();


        $new_song = new Song;

        $new_song->title = "Blinding Lights";
        $new_song->album = "After Hours";
        $new_song->author = "The Weeknd";
        $new_song->editor = "XO, Republic";
        $new_song->length = "03:21";
        $new_song->poster = "https://radiosound95.it/wp-content/uploads/2019/12/The-Weeknd-Blinding-Lights.jpg";

        $new_song->save();

        for ($i = 0; $i < 10; $i++) {
            $new_song = new Song;

            $new_song->title = $faker->words(2, true);
            $new_song->album = $faker->words(2, true);
            $new_song->author = $faker->sentence(3);
            $new_song->editor = $faker->word();
            $new_song->length = $faker->time();
            $new_song->poster = "https://picsum.photos/200/300";
            $new_song->save();
        }
    }
}
