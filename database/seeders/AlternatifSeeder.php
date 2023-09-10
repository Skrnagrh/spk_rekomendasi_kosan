<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['nama' => 'Kosan Pak Andi', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putra', 'harga'=> '100.000'],
            ['nama' => 'Kosan Pak Budi', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putri', 'harga'=> '100.000'],
            ['nama' => 'Kosan Mama Cindy', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putra', 'harga'=> '100.000'],
            ['nama' => 'Kosan Neng Dewi', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putri', 'harga'=> '100.000'],
            ['nama' => 'Kosan Teh Eka', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putra/putri', 'harga'=> '100.000'],
            ['nama' => 'Kosan Mas Faisal', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putra/putri', 'harga'=> '100.000'],
            ['nama' => 'Kosan Bu Gita', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putra/putri', 'harga'=> '100.000'],
            ['nama' => 'Kosan Kang Hadi', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putra/putri', 'harga'=> '100.000'],
            ['nama' => 'Kosan Indra', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putra/putri', 'harga'=> '100.000'],
            ['nama' => 'Kosan Joko Susilo', 'alamat'=> 'serang', 'nohp' => '081234567890',  'gander' => 'putra/putri', 'harga'=> '100.000'],
        ];


        foreach ($data as $key => $item) {
            Alternatif::create([
                'code' => $key + 1,
                'nama' => $item['nama'],
                'alamat' => $item['alamat'],
                'nohp' => $item['nohp'],
                'gander' => $item['gander'],
                'harga' => $item['harga'],
            ]);
        }
    }
}
