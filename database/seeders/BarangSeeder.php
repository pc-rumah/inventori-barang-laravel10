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
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Barang::create([
                'nama_barang' => $faker->word,
                'kategori_id' => $faker->numberBetween(1, 4),
                'jumlah' => $faker->numberBetween(1, 100),
                'kondisi' => $faker->randomElement(['Prima', 'Cukup Baik', 'Rusak']),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                // 'gambar' => $faker->image('public/storage/upload/gambar/', 640, 480, null, false),
                'gambar' => fake()->randomElement(['/upload/gambar/marmut.jpg']),
            ]);
        }
    }
}
