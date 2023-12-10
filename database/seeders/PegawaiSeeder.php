<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for($i = 0; $i < 10; $i++){
            Pegawai::create([
                'nip' => $faker->numerify,
                'nama' => $faker->name,
                'tanggal_lahir' => $faker->date,
                'nomor_telepon' => $faker->phoneNumber,
                'email' => $faker->email,
                'password' => $faker->numberBetween,
                
            ]);
        }
    }
}
