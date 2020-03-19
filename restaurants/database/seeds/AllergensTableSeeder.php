<?php

use Illuminate\Database\Seeder;
use App\Allergen;
class AllergensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $allergens =  [
            ['name' => 'Milk'],
            ['name'=>'Nuts'],
            ['name'=>'Soy'],
            ['name'=>'Gluten'],
            ['name'=>'Shelfish']
        ];

        foreach ($allergens as $allergen) {
            Allergen::insert($allergen);
        }
        
    }
}
