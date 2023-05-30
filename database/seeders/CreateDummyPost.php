<?php

namespace Database\Seeders;

use App\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateDummyPost extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = ['Nicesnippets.com', 'Webprofile.me', 'HDTuto.com', 'Nicesnippets.com'];

        foreach ($posts as $key => $value) {
            Post::create(['title'=>$value]);
    }
}
}
