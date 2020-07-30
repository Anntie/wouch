<?php

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
        $users = factory(\App\Models\WouchUser::class, 10)
            ->create()->pluck('id');

        $posts = collect();
        for ($i = 0; $i < 100; $i++) {
            $posts->push(
                factory(\App\Models\Post::class)->make([
                    'author_id' => $users->random(),
                ])
            );
        }
        $posts->each(fn(\App\Models\Post $post) => $post->save())->pluck('id');

        for ($i = 0; $i < 1000; $i++) {
            factory(\App\Models\Comment::class)->create([
                'post_id' => $posts->random(),
                'user_id' => $users->random(),
            ]);
        }
    }
}
