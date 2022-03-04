<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            '#mindfulness',
            '#health',
            '#fitness',
            '#lifestyle',
            '#food',
            '#travel',
            '#blog',
            '#sunset',

        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug =  Str::slug($tag, '-');
            $newTag->save();
        }
    }
}
