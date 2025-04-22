<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate(); // clears existing rows

        Product::create([
            'name' => 'Cozy Wool Yarn',
            'material' => 'Wool',
            'weight' => 'Aran',
            'color' => 'Forest Green',
            'length' => 150,
            'price' => 4.99,
            'description' => 'Soft and warm yarn, perfect for winter scarves and hats.',
            'image' => 'cozy_wool_forest.png'
        ]);

        Product::create([
            'name' => 'Fluffy Wool Yarn',
            'material' => 'Wool',
            'weight' => 'Bulky',
            'color' => 'Cherry Red',
            'length' => 120,
            'price' => 5.49,
            'description' => 'Vibrant and cozy bulky wool yarn, ideal for warm blankets and chunky sweaters.',
            'image' => 'fluffy_wool_red.png'
        ]);
    }
}
