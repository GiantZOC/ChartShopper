<?php

namespace Database\Seeders;

use App\Models\ChartProduct;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\OAuthProvider;

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

        // Post::truncate();
        // Category::truncate();

        $user = User::factory()->create([
            'name' => 'Test User 1',
            'email' => 'test1@test.com'
        ]);

        $user = User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@test.com'
        ]);

        $user = User::factory()->create([
            'name' => 'Test User 3',
            'email' => 'test3@test.com'
        ]);

        $chart = ChartProduct::factory()->create([
            'name' => 'US Charts'
        ]);

        $chart = ChartProduct::factory()->create([
            'name' => 'Mexico Charts'
        ]);

        $chart = ChartProduct::factory()->create([
            'name' => 'Brazil Charts'
        ]);

        $chart = ChartProduct::factory()->create([
            'name' => 'United Kingdom Charts'
        ]);

        $chart = ChartProduct::factory()->create([
            'name' => 'Australia Charts'
        ]);

        $chart = ChartProduct::factory()->create([
            'name' => 'Norway Charts'
        ]);

        $chart = ChartProduct::factory()->create([
            'name' => 'Sweden Charts'
        ]);
        $chart = ChartProduct::factory()->create([
            'name' => 'Japan Charts'
        ]);

        $chart = ChartProduct::factory()->create([
            'name' => 'Canada Charts'
        ]);

        

        // $category = Category::factory()->create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // Post::factory(5)->create([
        //     'user_id' => $user->id,
        //     'category_id' => $category->id
        // ]);
    
        // $users = User::factory(5)->create();
        
        
        // foreach($users as $user){
        //     $category = Category::factory()->create();
        //     Post::factory(5)->create([
        //         'user_id' => $user->id,
        //         'category_id' => $category->id
        //     ]);
        // };
    }
}
