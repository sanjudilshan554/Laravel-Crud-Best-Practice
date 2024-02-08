<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class ProductSeedr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array= [
            ['name'=>'category 1'],
            ['intro'=>'category 2'],
            ['categoryId'=> 1],
            ['name'=>'category 2'],
            ['intro'=>'category 3'],
            ['categoryId'=> 2],
        ];

        foreach ($array as $key => $value) {
            product::create($value);
        }
    }
}
