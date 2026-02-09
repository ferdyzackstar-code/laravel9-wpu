<?php

namespace App\Models;

class Post 
{
    private static $blog_posts = [
    [
        "title"=>"Orang Paling Tampan Sedunia!!",
        "slug"=>"judul-post-pertama",
        "author"=>"Farel Ferdyawan",
        "body"=>"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum adipisci autem assumenda, temporibus asperiores maxime illo officia laboriosam voluptatum magni maiores possimus facilis provident qui veritatis porro! Eos nam porro natus vitae iure facilis autem laborum numquam quibusdam, id ipsa dolores hic, excepturi quia officiis possimus, corporis in laudantium eveniet obcaecati sapiente. Minima, porro. Eveniet placeat voluptatem minus sit, facilis quos libero, nesciunt obcaecati velit tempore ex itaque dolore magnam?"
    ],
    [
        "title"=>"The Sigma Midlaner!!",
        "slug"=>"judul-post-kedua",
        "author"=>"Audrel Qiano M.H.",
        "body"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi fugit exercitationem, quisquam obcaecati, tempore porro voluptas cupiditate earum officiis inventore, praesentium laudantium explicabo nemo! In possimus voluptate iure provident minus placeat quas! Ipsum illo, impedit dolorem ea illum nobis est aspernatur, omnis rerum officiis repellendus incidunt perferendis aperiam, blanditiis similique. Veniam iste deserunt esse necessitatibus aperiam nostrum quia? Quas, blanditiis voluptate sequi explicabo nostrum fuga esse omnis eaque veniam iure sed doloribus corrupti minima reprehenderit porro temporibus sint illo id earum molestias atque error perspiciatis quo vitae. Cupiditate recusandae quae minus repellendus? Distinctio incidunt debitis saepe qui tempore, alias quibusdam?"
    ]
];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
