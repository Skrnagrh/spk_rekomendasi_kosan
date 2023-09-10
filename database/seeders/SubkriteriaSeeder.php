<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Database\Seeder;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['range' => 'Rp 500 – 550RB ', 'nilai' => 1, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => 'Rp 450 – 500RB', 'nilai' => 2, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => 'Rp 400 – 450RB', 'nilai' => 3, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => 'Rp 350 – 400RB', 'nilai' => 4, 'kriteria_id' => Kriteria::find(1)->id],
            ['range' => 'Rp 300 – 350RB', 'nilai' => 5, 'kriteria_id' => Kriteria::find(1)->id],

            ['range' => 'K.Mandi Dalam', 'nilai' => 1, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => 'K.Mandi Dalam, Kasur', 'nilai' => 2, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => 'K.Mandi Dalam, Kasur', 'nilai' => 3, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => 'K.Mandi Dalam, Kasur, lemari, kipas', 'nilai' => 4, 'kriteria_id' => Kriteria::find(2)->id],
            ['range' => 'K.Mandi Dalam, Kasur, lemari, kipas', 'nilai' => 5, 'kriteria_id' => Kriteria::find(2)->id],

            ['range' => '500 - 600 meter', 'nilai' => 1, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => '400 - 500 meter', 'nilai' => 2, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => '300 - 400 meter', 'nilai' => 3, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => '200 - 300 meter', 'nilai' => 4, 'kriteria_id' => Kriteria::find(3)->id],
            ['range' => '100 - 200 meter', 'nilai' => 5, 'kriteria_id' => Kriteria::find(3)->id],

            ['range' => '3 X 3 meter', 'nilai' => 1, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => '3 X 4 meter', 'nilai' => 2, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => '4 X 4 meter', 'nilai' => 3, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => '4 X 5 meter', 'nilai' => 4, 'kriteria_id' => Kriteria::find(4)->id],
            ['range' => '5 X 5 meter', 'nilai' => 5, 'kriteria_id' => Kriteria::find(4)->id],

            ['range' => 'Tidak Aman', 'nilai' => 1, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => 'Kurang Aman', 'nilai' => 2, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => 'Cukup Aman', 'nilai' => 3, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => 'Aman', 'nilai' => 4, 'kriteria_id' => Kriteria::find(5)->id],
            ['range' => 'Sangat Aman', 'nilai' => 5, 'kriteria_id' => Kriteria::find(5)->id],

        ];

        foreach ($data as $item) {
            Subkriteria::create([
                'range' => $item['range'],
                'nilai' => $item['nilai'],
                'kriteria_id' => $item['kriteria_id']
            ]);
        }
    }
}
