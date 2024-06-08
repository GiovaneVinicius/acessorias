<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_categories')->insert([
            ['name' => 'Eletrônicos'],
            ['name' => 'Roupas'],
            ['name' => 'Alimentos'],
            ['name' => 'Livros'],
        ]);
    }
}

