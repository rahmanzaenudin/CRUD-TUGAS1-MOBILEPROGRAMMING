<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for($i = 0; $i < 10; $i++){
            Pasien::create([
                'nomor_rm' => $faker->numerify,
                'nama' => $faker->name,
                'tanggal_lahir' => $faker->date,
                'nomor_telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
            ]);
        }
    }
}
