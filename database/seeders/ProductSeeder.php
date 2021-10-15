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
            'name' => 'LARAVEL y LIVEWIRE',
            'cost' => 200,
            'price' => 350,
            'barcode' => '75010065987',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);
        Product::create([
            'name' => 'RUNNING NIKE',
            'cost' => 1200,
            'price' => 1650,
            'barcode' => '75010065986',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 2,
            'image' => 'tenis.png'
        ]);
        Product::create([
            'name' => 'IPHONE 11',
            'cost' => 12000,
            'price' => 15350,
            'barcode' => '75010065987',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 3,
            'image' => 'iphone.png'
        ]);
        Product::create([
            'name' => 'PC GAMER',
            'cost' => 15000,
            'price' => 22000,
            'barcode' => '75010065987',
            'stock' => 1000,
            'alerts' => 10,
            'category_id' => 4,
            'image' => 'pc.png'
        ]);
    }
}
