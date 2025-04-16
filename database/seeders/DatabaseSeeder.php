<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $user = User::factory()->create([
        'first_name' => 'David',
        'last_name' => 'John',
        'phone' => '9867654554',
        'email' => 'johndoe@example.com',
        'password' => Hash::make('david@john123')
    ]);

    $categories = ['Food', 'Transport', 'Entertainment', 'Health', 'Bills'];
    foreach ($categories as $category) {
        Category::create(['name' => $category]);
    }

    Expense::create([
        'user_id' => $user->id,
        'category_id' => 1, 
        'amount' => 50.00,
        'description' => 'Lunch at a restaurant',
        'date' => now(),
    ]);
}
}

