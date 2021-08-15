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
            'name' => 'Pengembangan Diri',
            'slug' => 'pengembangan-diri'
        ]);
        $user = User::factory(10)
            ->has(Post::factory()->count(3))
            ->create();
    }
}
