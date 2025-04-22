<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
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
    }
}
