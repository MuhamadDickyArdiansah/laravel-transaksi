<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name' => 'Admin 1',
            'username' => 'admin1',
            'role' => 'admin',
            'status' => 1,
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password')
        ]);


        User::create([
            'name' => 'User 1',
            'username' => 'user1',
            'role' => 'user',
            'status' => 1,
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'User 2',
            'username' => 'user2',
            'role' => 'user',
            'status' => 0,
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password')
        ]);

        for ($i = 1; $i <= 9; $i++) {
            Category::create([
                'name' => "Category $i",
                'slug' => "category-$i"
            ]);
        }

        for ($i = 1; $i <= 9; $i++) {
            Course::create([
                'category_id' => $i,
                'name' => "Course $i",
                'slug' => "course-$i",
                'description' => 'Hello World'
            ]);
        }
    }
}
