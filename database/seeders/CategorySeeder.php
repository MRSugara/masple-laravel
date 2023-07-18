<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Harga HPP',
            'Harga Reseller',
            'Real Stock',
            'Sam Ple',
            'Tembakau & cerutu customer',
            'Tembakau Reseller SABIL'
        ];
        foreach ($data as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
