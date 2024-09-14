<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Ручка',
            'cost' => 100,
            'count' => 1000,
        ]);

        Product::create([
            'title' => 'Стол',
            'cost' => 5000,
            'count' => 1000,
        ]);

        Product::create([
            'title' => 'Стул',
            'cost' => 1000,
            'count' => 1000,
        ]);

        Product::create([
            'title' => 'Воздушный шар',
            'cost' => 100,
            'count' => 1000,
        ]);

        Product::create([
            'title' => 'Спрей',
            'cost' => 800,
            'count' => 1000,
        ]);

        Product::create([
            'title' => 'Чайник',
            'cost' => 300,
            'count' => 1000,
        ]);
    }
}
