<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

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

        User::factory(6)->create();

        User::create([
            'name' => 'Bobi Setiawan',
            'username' => 'bobiboi',
            'email' => 'test1@example.com',
            'password' => bcrypt('123')
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'School Life',
            'slug' => 'school-life'
        ]);

        Category::create([
            'name' => 'Travelling',
            'slug' => 'travelling'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Post Number 1',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'post-number-1',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis placeat eius maxime nesciunt et nulla soluta dolores nisi veniam, accusamus suscipit assumenda quae, sunt doloremque',
        //     'content' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis placeat eius maxime nesciunt et nulla soluta dolores nisi veniam, accusamus suscipit assumenda quae, sunt doloremque, hic doloribus quidem deserunt velit est cum. Dolor, eum delectus assumenda voluptatem quam unde enim vero voluptate explicabo necessitatibus quibusdam culpa inventore accusamus placeat maiores iure blanditiis excepturi obcaecati ab natus?</p> <p>Ex delectus, possimus architecto dolore earum nobis. Facere architecto velit consectetur inventore debitis repellendus eaque amet reiciendis ipsam numquam corrupti officiis, tempora aspernatur nulla similique, est natus! Ad molestiae minus veniam. Esse vel voluptatem nisi vero necessitatibus? Assumenda nesciunt, in quo dolore molestias qui!</p>'
        // ]);
    }
}