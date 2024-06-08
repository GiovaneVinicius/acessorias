<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $category1 = DB::table('product_categories')->where('name', 'Eletrônicos')->first();
        $category2 = DB::table('product_categories')->where('name', 'Roupas')->first();
        $category3 = DB::table('product_categories')->where('name', 'Alimentos')->first();
        $category4 = DB::table('product_categories')->where('name', 'Livros')->first();

        DB::table('products')->insert([
            [
                'id' => (string) Uuid::uuid4(),
                'name' => 'Celular',
                'description' => 'Smartphone Android',
                'price' => 999.99,
                'category_id' => $category1->id
            ],
            [
                'id' => (string) Uuid::uuid4(),
                'name' => 'Camisa',
                'description' => 'Camisa de algodão',
                'price' => 29.99,
                'category_id' => $category2->id
            ],
            [
                'id' => (string) Uuid::uuid4(),
                'name' => 'Macarrão',
                'description' => 'Macarrão instantâneo',
                'price' => 2.99,
                'category_id' => $category3->id
            ],
            [
                'id' => (string) Uuid::uuid4(),
                'name' => 'Livro de PHP',
                'description' => 'Guia completo de PHP',
                'price' => 49.99,
                'category_id' => $category4->id
            ],
        ]);
    }
}


