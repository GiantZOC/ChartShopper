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
            'id' => 1,
            'name' => 'Test User 1',
            'email' => 'test1@test.com'
        ]);

        $user = User::factory()->create([
            'id' => 2,
            'name' => 'Test User 2',
            'email' => 'test2@test.com'
        ]);

        $user = User::factory()->create([
            'id' => 3,
            'name' => 'Test User 3',
            'email' => 'test3@test.com'
        ]);

        $chart = ChartProduct::create([
            'chart_product_id' => 1,
            'name' => 'US Charts',
            'latitude' => 1000,
            'longitude' => 1000
        ]);

        $chart = ChartProduct::create([
            'chart_product_id' => 2,
            'name' => 'Mexico Charts',
            'latitude' => 1000,
            'longitude' => 1000
        ]);

        $chart = ChartProduct::create([
            'chart_product_id' => 3,
            'name' => 'Brazil Charts',
            'latitude' => 1000,
            'longitude' => 1000
        ]);

        $chart = ChartProduct::create([
            'chart_product_id' => 4,
            'name' => 'United Kingdom Charts',
            'latitude' => 1000,
            'longitude' => 1000
        ]);

        $chart = ChartProduct::create([
            'chart_product_id' => 5,
            'name' => 'Australia Charts',
            'latitude' => 1000,
            'longitude' => 1000
        ]);

        $chart = ChartProduct::create([
            'chart_product_id' => 6,
            'name' => 'Norway Charts',
            'latitude' => 1000,
            'longitude' => 1000
        ]);

        $chart = ChartProduct::create([
            'chart_product_id' => 7,
            'name' => 'Sweden Charts',
            'latitude' => 1000,
            'longitude' => 1000
        ]);

        $chart = ChartProduct::create([
            'chart_product_id' => 8,
            'name' => 'Japan Charts',
            'latitude' => 1000,
            'longitude' => 1000
        ]);

        $chart = ChartProduct::create([
            'chart_product_id' => 9,
            'name' => 'Canada Charts',
            'latitude' => 1000,
            'longitude' => 1000
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
