<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'Makanan Berat'],
            ['name' => 'Makanan Ringan'],
            ['name' => 'Minuman'],
            ['name' => 'Dessert'],
            ['name' => 'Cemilan'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
