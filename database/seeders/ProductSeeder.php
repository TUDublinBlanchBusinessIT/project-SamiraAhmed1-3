<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
{
    \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    \DB::table('products')->truncate(); // Clears all rows

    // Wool Products
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

    Product::create([ // Another Wool Product
        'name' => 'Soft Wool Yarn',
        'material' => 'Wool',
        'weight' => 'DK',
        'color' => 'Light Blue',
        'length' => 200,
        'price' => 6.29,
        'description' => 'A soft and smooth yarn, perfect for lightweight sweaters and baby clothes.',
        'image' => 'soft_wool_lightblue.png'
    ]);

    // Cotton Products
    Product::create([
        'name' => 'Organic Cotton Yarn', // This is the product you were referring to!
        'material' => 'Cotton',
        'weight' => 'Sport',
        'color' => 'Natural White',
        'length' => 180,
        'price' => 3.89,
        'description' => 'Soft, organic cotton yarn ideal for breathable summer garments and accessories.',
        'image' => 'organic_cotton_white.png'
    ]);

    Product::create([
        'name' => 'Bright Cotton Yarn',
        'material' => 'Cotton',
        'weight' => 'Worsted',
        'color' => 'Sunflower Yellow',
        'length' => 160,
        'price' => 4.19,
        'description' => 'Bright and cheerful cotton yarn, perfect for fun summer projects and beachwear.',
        'image' => 'bright_cotton_yellow.png'
    ]);

    Product::create([
        'name' => 'Soft Cotton Yarn',
        'material' => 'Cotton',
        'weight' => 'DK',
        'color' => 'Sky Blue',
        'length' => 170,
        'price' => 4.49,
        'description' => 'Soft cotton yarn, ideal for light and airy scarves, shawls, and delicate garments.',
        'image' => 'soft_cotton_skyblue.png'
    ]);

    // Acrylic Products
    Product::create([ // First Acrylic Yarn
        'name' => 'Soft Acrylic Yarn',
        'material' => 'Acrylic',
        'weight' => 'Worsted',
        'color' => 'Ocean Blue',
        'length' => 180,
        'price' => 3.59,
        'description' => 'A soft, vibrant acrylic yarn perfect for blankets and home decor.',
        'image' => 'soft_acrylic_oceanblue.png'
    ]);

    Product::create([ // Second Acrylic Yarn
        'name' => 'Bright Acrylic Yarn',
        'material' => 'Acrylic',
        'weight' => 'Bulky',
        'color' => 'Sunset Orange',
        'length' => 150,
        'price' => 4.29,
        'description' => 'Bright and fun bulky acrylic yarn, perfect for cozy scarves and hats.',
        'image' => 'bright_acrylic_orange.png'
    ]);

    Product::create([ // Third Acrylic Yarn
        'name' => 'Smooth Acrylic Yarn',
        'material' => 'Acrylic',
        'weight' => 'Sport',
        'color' => 'Mint Green',
        'length' => 170,
        'price' => 3.99,
        'description' => 'Smooth acrylic yarn, perfect for lightweight summer projects.',
        'image' => 'smooth_acrylic_mintgreen.png'
    ]);
}

}
