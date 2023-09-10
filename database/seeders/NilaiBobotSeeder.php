<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiBobot;
use Illuminate\Database\Seeder;

class NilaiBobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allKriteria = Kriteria::all();
        $allAlternatif = Alternatif::all();
        // Urutan Sesuai Excel
        $data = [
            'alternatif1' => [3, 1, 1, 4, 5],
            'alternatif2' => [3, 2, 3, 1, 3],
            'alternatif3' => [2, 2, 1, 1, 3],
            'alternatif4' => [4, 1, 4, 1, 4],
            'alternatif5' => [4, 1, 4, 1, 4],
            'alternatif6' => [1, 1, 3, 1, 5],
            'alternatif7' => [2, 1, 2, 1, 4],
            'alternatif8' => [1, 3, 1, 4, 2],
            'alternatif9' => [2, 1, 5, 1, 2],
            'alternatif10' => [2, 1, 1, 1, 2]
        ];

        foreach ($allAlternatif as $keyAlt => $alternatif) {
            foreach ($allKriteria as $keyKrit => $kriteria) {
                NilaiBobot::create([
                    'nilai' => $data['alternatif' . ($keyAlt + 1)][$keyKrit],
                    'kriteria_id' => $kriteria->id,
                    'alternatif_id' => $alternatif->id
                ]);
            }
        }
    }
}
