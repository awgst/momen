<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Topic::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);
        Topic::create([
            'name' => 'Gaya Hidup',
            'slug' => 'gaya-hidup'
        ]);
        Topic::create([
            'name' => 'Otomotif',
            'slug' => 'otomotif'
        ]);
        Topic::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning'
        ]);
        Topic::create([
            'name' => 'Web Desain',
            'slug' => 'web-desain'
        ]);
        Topic::create([
            'name' => 'Mobile App',
            'slug' => 'mobile-app'
        ]);
        Topic::create([
            'name' => 'Pengembangan Diri',
            'slug' => 'pengembangan-diri'
        ]);
        Topic::create([
            'name' => 'Kecantikan',
            'slug' => 'kecantikan'
        ]);
        Topic::create([
            'name' => 'Seni',
            'slug' => 'seni'
        ]);
        Topic::create([
            'name' => 'Web Development',
            'slug' => 'web-development'
        ]);
        $user = User::factory(25)
            ->has(Post::factory()->count(mt_rand(3,10)))
            ->create();
    }
}
