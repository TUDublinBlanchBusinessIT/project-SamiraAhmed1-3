<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Sample Product',
            'description' => 'This is a sample product for the shop.',
            'price' => 29.99,
            'image' => 'sample.jpg'
        ]);
    }
}
