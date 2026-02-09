<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

/*         User::create([
            'name' => 'Farel Ferdyawan',
            'email' => 'ferdyganteng@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        User::create([
            'name' => 'Audrel Qiano M.H.',
            'email' => 'audrelll@gmail.com',
            'password' => bcrypt('54321'),
        ]); */

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();

/*         Post::create([
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit minus maxime quidem beatae saepe. Non eveniet possimus,',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit minus maxime quidem beatae saepe. Non eveniet possimus, consequatur 
            laborum illum necessitatibus ad explicabo perferendis delectus fugiat commodi nulla quisquam? Inventore, cupiditate voluptas aperiam modi nostrum 
            temporibus dolorum laudantium tenetur expedita illo animi recusandae quae ratione consectetur doloribus quaerat eveniet dolore velit veritatis? Veniam 
            sit quaerat voluptatem dolorum voluptate! Minus, commodi quisquam sequi harum quis nobis maiores aspernatur fugiat? Odit ad asperiores vitae! Quod dolorem 
            perferendis, reprehenderit voluptatibus molestias quos dolores cumque tempore saepe praesentium sint laborum, accusantium modi. Nihil dicta distinctio, quo 
            temporibus ducimus accusamus voluptate debitis! Nihil, laudantium repellendus!',
            'category_id' => 1,
            'user_id' => 1, 
        ]);

        Post::create([
            'title' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit minus maxime quidem beatae saepe. Non eveniet possimus,',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit minus maxime quidem beatae saepe. Non eveniet possimus, consequatur 
            laborum illum necessitatibus ad explicabo perferendis delectus fugiat commodi nulla quisquam? Inventore, cupiditate voluptas aperiam modi nostrum 
            temporibus dolorum laudantium tenetur expedita illo animi recusandae quae ratione consectetur doloribus quaerat eveniet dolore velit veritatis? Veniam 
            sit quaerat voluptatem dolorum voluptate! Minus, commodi quisquam sequi harum quis nobis maiores aspernatur fugiat? Odit ad asperiores vitae! Quod dolorem 
            perferendis, reprehenderit voluptatibus molestias quos dolores cumque tempore saepe praesentium sint laborum, accusantium modi. Nihil dicta distinctio, quo 
            temporibus ducimus accusamus voluptate debitis! Nihil, laudantium repellendus!',
            'category_id' => 1,
            'user_id' => 1, 
        ]);

        Post::create([
            'title' => 'Judul Ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit minus maxime quidem beatae saepe. Non eveniet possimus,',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit minus maxime quidem beatae saepe. Non eveniet possimus, consequatur 
            laborum illum necessitatibus ad explicabo perferendis delectus fugiat commodi nulla quisquam? Inventore, cupiditate voluptas aperiam modi nostrum 
            temporibus dolorum laudantium tenetur expedita illo animi recusandae quae ratione consectetur doloribus quaerat eveniet dolore velit veritatis? Veniam 
            sit quaerat voluptatem dolorum voluptate! Minus, commodi quisquam sequi harum quis nobis maiores aspernatur fugiat? Odit ad asperiores vitae! Quod dolorem 
            perferendis, reprehenderit voluptatibus molestias quos dolores cumque tempore saepe praesentium sint laborum, accusantium modi. Nihil dicta distinctio, quo 
            temporibus ducimus accusamus voluptate debitis! Nihil, laudantium repellendus!',
            'category_id' => 2,
            'user_id' => 1, 
        ]);

        Post::create([
            'title' => 'Judul Keempat',
            'slug' => 'judul-keempat',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit minus maxime quidem beatae saepe. Non eveniet possimus,',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit minus maxime quidem beatae saepe. Non eveniet possimus, consequatur 
            laborum illum necessitatibus ad explicabo perferendis delectus fugiat commodi nulla quisquam? Inventore, cupiditate voluptas aperiam modi nostrum 
            temporibus dolorum laudantium tenetur expedita illo animi recusandae quae ratione consectetur doloribus quaerat eveniet dolore velit veritatis? Veniam 
            sit quaerat voluptatem dolorum voluptate! Minus, commodi quisquam sequi harum quis nobis maiores aspernatur fugiat? Odit ad asperiores vitae! Quod dolorem 
            perferendis, reprehenderit voluptatibus molestias quos dolores cumque tempore saepe praesentium sint laborum, accusantium modi. Nihil dicta distinctio, quo 
            temporibus ducimus accusamus voluptate debitis! Nihil, laudantium repellendus!',
            'category_id' => 2,
            'user_id' => 2, 
        ]); */

    }
}
