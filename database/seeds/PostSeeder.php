<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Post;
use Illuminate\Support\Str;
use App\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->sentence(2, true);
            $newPost->author = $faker->name();
            $newPost->content = $faker->text();
            $newPost->slug = Str::slug($newPost->title . '-' . $i, '-');
            $newPost->user_id = User::inRandomOrder()->First()->id;
            $newPost->save();
        }
    }
}
