<?php

namespace App\Models;

class Post
{
    private static $blogPosts = [
        [
            "title" => "Post 1",
            "slug" => "post-1",
            "author" => "Zetsu",
            "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi accusamus sint minima neque repudiandae delectus, non, consectetur ratione vitae quod consequatur laboriosam illo nam fugiat, velit fuga laudantium in nulla sapiente porro placeat perspiciatis dolorum quibusdam laborum. Tempore, obcaecati culpa deleniti sunt dicta illo maxime dolorem iusto veniam earum accusamus fuga dolores deserunt esse ipsum expedita iste ratione hic velit exercitationem. Veniam pariatur dolorum hic expedita. Pariatur minus, est autem, tenetur commodi eius facere quas eum, nulla error optio quisquam."
        ],
    
        [
            "title" => "Post 2",
            "slug" => "post-2",
            "author" => "Not Zetsu",
            "content" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur quia tempore, nihil officia reiciendis corrupti soluta labore culpa ducimus. Accusantium, a neque. Illum ipsa placeat voluptatum atque earum animi officia cupiditate dolores voluptatem dicta aut inventore reprehenderit, adipisci ipsam. Natus, totam laborum fuga quasi eius minima inventore quas sit minus dolore deserunt veritatis vel provident nesciunt pariatur quae officiis incidunt. Minus cumque velit, ab deserunt eaque praesentium suscipit sint necessitatibus laborum ad. Dignissimos inventore provident consectetur esse autem aperiam, explicabo nobis vitae? Praesentium, commodi. Eum vero nisi molestiae temporibus quibusdam?"
        ]
    ];

    public static function getAllPosts() {
        return collect(self::$blogPosts);
    }

    public static function getPostBySlug($slug) {
        $allPosts = static::getAllPosts();
        return $allPosts->firstWhere("slug", $slug);
    }
}
