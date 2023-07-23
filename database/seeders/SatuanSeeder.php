<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'pcs',
            'kg',
            'gram',
            'batang',
            'tray'

        ];
        foreach ($data as $satuan) {
            Satuan::create([
                'name' => $satuan,
            ]);
        }
    }
}
