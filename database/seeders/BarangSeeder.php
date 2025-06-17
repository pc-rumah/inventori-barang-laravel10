<?php

namespace Database\Seeders;

use App\Models\Barang;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 10) as $index) {
            Barang::create([
                'nama_barang' => fake()->word,
                'kategori_id' => fake()->numberBetween(1, 4),
                'jumlah' => fake()->numberBetween(1, 100),
                'kondisi' => fake()->randomElement(['Prima', 'Cukup Baik', 'Rusak']),
                'created_at' => fake()->dateTimeBetween('-1 years', 'now'),
                'gambar' => fake()->randomElement(['/upload/gambar/marmut.jpg']),
            ]);
        }
    }
}
