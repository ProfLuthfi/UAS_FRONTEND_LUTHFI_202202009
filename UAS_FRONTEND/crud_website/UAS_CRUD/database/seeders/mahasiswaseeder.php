<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\mahasiswa;

class mahasiswaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i=1;$i <=10;$i++){
            mahasiswa::create([
                'nim'=>$faker->numberBetween(1000,5000),
                'nama'=>$faker->name,
                'jurusan'=>$faker->jobTitle,
            ]
            );
        }
    }
}
