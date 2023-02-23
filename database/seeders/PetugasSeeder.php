<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Petugas::create([
            'namapetugas'   =>'Rafi Ikhwan',
            'email'         =>'coba@gmail.com',
            'password'      =>Hash::make('coba123'),
            'hp'            =>643325,
            'role'          =>'Admin',
        ]);
    }
}
