<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('proposals')->insert([
            'user_id' => $faker->randomDigit,
            'judul' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'deskripsi' => implode(' ', $faker->paragraphs($nb = 3, $asText = false)),
            'kategori' => $faker->randomElement($array = array ('Kesehatan', 'Pendidikan', 'Lingkungan', 'Kemanusiaan', 'Kebudayaan', 'Lainnya')),
        ]);
    }
}
