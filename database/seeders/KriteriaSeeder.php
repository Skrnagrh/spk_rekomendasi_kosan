<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'HRG', 'description' => 'Harga', 'type' => 'cost', 'bobot' => 5],
            ['name' => 'FSL', 'description' => 'Fasilitas', 'type' => 'benefit', 'bobot' => 2],
            ['name' => 'JRK', 'description' => 'Jarak', 'type' => 'benefit', 'bobot' => 3],
            ['name' => 'LLS', 'description' => 'Luas', 'type' => 'benefit', 'bobot' => 1],
            ['name' => 'RSK', 'description' => 'Resiko Keamanan', 'type' => 'benefit', 'bobot' => 4],
        ];

        foreach ($data as $key => $item) {
            Kriteria::create([
                'code' => $key + 1,
                'name' => $item['name'],
                'description' => $item['description'],
                'type' => $item['type'],
                'bobot' => $item['bobot'],
            ]);
        }
    }
}
