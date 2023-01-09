<?php

namespace Database\Seeders;

use App\Models\Marker;
use Illuminate\Database\Seeder;

class MarkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marker::create([
            'latitude' => '11.2444',
            'longitude' => '-74.2036' ,
            'name' => 'Punto ref. 1'
        ]);

        Marker::create([
            'latitude' => '11.2391',
            'longitude' => '-74.1963',
            'name' => 'Punto ref. 2'
        ]);
    }
}
