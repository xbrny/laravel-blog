<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post1 = Post::updateOrCreate([
        	'title' => 'My First Post',
        	'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa iusto, quaerat cumque assumenda corrupti velit in odio qui voluptates voluptatum eligendi sequi enim maxime, omnis debitis repellat ex aut natus fugit fugiat excepturi. Mollitia obcaecati qui harum iure pariatur minus esse ducimus quam asperiores. Iste tempore adipisci voluptate ea, illo.',
            'slug' => str_slug('My First Post'),
        	'featured' => 'uploads/posts/default.png',
        	'category_id' => 1
        ]);

        $post1->tags()->attach(1);

        $post2 = Post::updateOrCreate([
        	'title' => 'My Second Post',
        	'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa iusto, quaerat cumque assumenda corrupti velit in odio qui voluptates voluptatum eligendi sequi enim maxime, omnis debitis repellat ex aut natus fugit fugiat excepturi. Mollitia obcaecati qui harum iure pariatur minus esse ducimus quam asperiores. Iste tempore adipisci voluptate ea, illo.',
        	'slug' => str_slug('My Second Post'),
            'featured' => 'uploads/posts/default.png',
        	'category_id' => 1
        ]);

        $post2->tags()->attach([1, 2]);

        $post3 = Post::updateOrCreate([
        	'title' => 'My Third Post',
        	'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa iusto, quaerat cumque assumenda corrupti velit in odio qui voluptates voluptatum eligendi sequi enim maxime, omnis debitis repellat ex aut natus fugit fugiat excepturi. Mollitia obcaecati qui harum iure pariatur minus esse ducimus quam asperiores. Iste tempore adipisci voluptate ea, illo.',
        	'slug' => str_slug('My Third Post'),
            'featured' => 'uploads/posts/default.png',
        	'category_id' => 2
        ]);

        $post3->tags()->attach(3);

        $post4 = Post::updateOrCreate([
        	'title' => 'My Fourth Post',
        	'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa iusto, quaerat cumque assumenda corrupti velit in odio qui voluptates voluptatum eligendi sequi enim maxime, omnis debitis repellat ex aut natus fugit fugiat excepturi. Mollitia obcaecati qui harum iure pariatur minus esse ducimus quam asperiores. Iste tempore adipisci voluptate ea, illo.',
        	'slug' => str_slug('My Fourth Post'),
            'featured' => 'uploads/posts/default.png',
        	'category_id' => 3
        ]);

        $post4->tags()->attach([2, 3]);

    }
}
