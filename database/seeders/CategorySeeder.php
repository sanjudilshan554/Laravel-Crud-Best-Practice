<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array= [
            ['name'=>'category 1'],
            ['name'=>'category 2'],
            ['name'=>'category 3'],
            ['name'=>'category 4'],
            ['name'=>'category 5'],
            ['name'=>'category 6'],
            ['name'=>'category 7'],
            

        ];

        // $category=category::get();

        // for($i=0; $i<count($array); $i++){
        //     if($category[$i]['name']== $array[$i]['name']){
        //         $found=true;
        //         break;
        //     }else{
        //         $found=false;
        //         }

        //     if(!$found){
            
        // }
        foreach($array as $value){
            category::create($value);
        }
        
    }
}
