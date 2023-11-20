<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SneakerSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sneakers')->insert([
            [
                'brand_id' => 1,
                'model' => 'sneaker_1',
                'size' => 42,
                'cost' => 5
            ],

            [
                'brand_id' => 2,
                'model' => 'sneaker_2',
                'size' => 45,
                'cost' => 2
            ],
        ]);
    }
}
