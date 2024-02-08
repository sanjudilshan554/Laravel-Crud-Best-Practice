<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\product;
use Illuminate\Database\Seeder;
use Database\Factories\setingUpFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       product::factory(100)->create();
       // Product::factory()->for(setingUpFactory::class)->count(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
          //  CategorySeeder::class,
          //  ProductSeedr::class,
        ]);
    }
}
