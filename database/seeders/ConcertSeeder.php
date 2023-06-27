<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('concerts')->insert([
            'concert_name' => 'SkyBand Concert',
            'place' => 'Lapangan A Bogor',
            'date' => '2023-08-25 15:00:00',
            'stock' => 1000,
            'price' => 100000,
            'created_at' => now()
        ]);
    }
}
