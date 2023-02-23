<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 30; $i++){
            Siswa::create([
                'nis' => $faker->randomDigit(),
                'namasiswa' => $faker->name(),
                'kelas' => $faker->company(),
                'hp'    => $faker->numberBetween(8000,9000)
            ]);

        }
    }
}
