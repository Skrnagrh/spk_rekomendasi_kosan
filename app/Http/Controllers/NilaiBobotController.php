<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\NilaiBobot;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NilaiBobotController extends Controller
{
    public function index()
    {
        $allKriteria = Kriteria::all();
        $allDataProcessed = $this->process_index_data();
        $checkHasEmptyData = $this->check_nilai_bobot_has_empty_data();
        $nilaiBobotGroupByAlternatifId = [];
        $matrixTernormalisasi = [];
        if (!$checkHasEmptyData) {
            $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
                ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
                ->select('nilai_bobot.alternatif_id', 'alternatif.code', 'alternatif.nama')
                ->orderBy('nilai_bobot.alternatif_id')
                ->groupBy('nilai_bobot.alternatif_id')
                ->get();
            $matrixTernormalisasi = $this->matrix_ternormalisasi($nilaiBobotGroupByAlternatifId);
        }


        return view('dashboard.nilai_bobot.index', compact('allDataProcessed', 'allKriteria',  ['nilaiBobotGroupByAlternatifId',  'matrixTernormalisasi', 'checkHasEmptyData']));
    }

    protected function process_index_data()
    {
        $EMPTY_VALUE = 'Empty';
        $result = [];
        $allKriteria = Kriteria::all();
        $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->select('alternatif_id', 'code', 'nama', 'nama')
            ->orderBy('alternatif.code')
            ->groupBy('alternatif.id')
            ->get();

        // Array For Compare to Data Nilai Bobot
        $arrayKriteriaIdFromKriteria = [];
        foreach ($allKriteria as $item) {
            $arrayKriteriaIdFromKriteria[] = $item->id;
        }

        foreach ($nilaiBobotGroupByAlternatifId as $item) {
            $dataKriteria = [];

            $selectedNilaiBobot = DB::table('nilai_bobot')
                ->where('alternatif_id', '=', $item->alternatif_id)
                ->orderBy('kriteria_id')
                ->get();

            // Array for Compare to Data Kriteria ID
            $arrayKriteriaIdFromSelectedNilaiBobot = [];
            foreach ($selectedNilaiBobot as $itemKriteria) {
                $arrayKriteriaIdFromSelectedNilaiBobot[] = $itemKriteria->kriteria_id;
                $dataKriteria[] = ['kriteria_id' => $itemKriteria->kriteria_id, 'nilaiBobot' => $itemKriteria->nilai];
            }

            // Comparing Data Kriteria ID & Nilai Bobot
            $emptyKriteriaId = array_diff($arrayKriteriaIdFromKriteria, $arrayKriteriaIdFromSelectedNilaiBobot);
            foreach ($emptyKriteriaId as $kriteriaId) {
                $dataKriteria[] = ['kriteria_id' => $kriteriaId, 'nilaiBobot' => $EMPTY_VALUE];
            }

            // Sorting Multidimensional Array By Kriteria ID
            $selectedSorting = array_column($dataKriteria, 'kriteria_id');
            array_multisort($selectedSorting, SORT_ASC, $dataKriteria);

            $item->dataKriteria = $dataKriteria;
            $result[] = $item;
        }

        return $result;
    }

    protected function check_nilai_bobot_has_empty_data()
    {
        $condition = false;
        $EMPTY_VALUE = 'Empty';
        $allKriteria = Kriteria::all();
        $nilaiBobotGroupByAlternatifId = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->select('alternatif_id', 'code', 'nama', 'nama')
            ->orderBy('alternatif.code')
            ->groupBy('alternatif.id')
            ->get();

        // Array For Compare to Data Nilai Bobot
        $arrayKriteriaIdFromKriteria = [];
        foreach ($allKriteria as $item) {
            $arrayKriteriaIdFromKriteria[] = $item->id;
        }

        foreach ($nilaiBobotGroupByAlternatifId as $item) {
            $dataKriteria = [];

            $selectedNilaiBobot = DB::table('nilai_bobot')
                ->where('alternatif_id', '=', $item->alternatif_id)
                ->orderBy('kriteria_id')
                ->get();

            // Array for Compare to Data Kriteria ID
            $arrayKriteriaIdFromSelectedNilaiBobot = [];
            foreach ($selectedNilaiBobot as $itemKriteria) {
                $arrayKriteriaIdFromSelectedNilaiBobot[] = $itemKriteria->kriteria_id;
                $dataKriteria[] = ['kriteria_id' => $itemKriteria->kriteria_id, 'nilai' => $itemKriteria->nilai];
            }

            // Comparing Data Kriteria ID & Nilai Bobot
            $emptyKriteriaId = array_diff($arrayKriteriaIdFromKriteria, $arrayKriteriaIdFromSelectedNilaiBobot);
            foreach ($emptyKriteriaId as $kriteriaId) {
                $dataKriteria[] = ['kriteria_id' => $kriteriaId, 'nilai' => $EMPTY_VALUE];
                $condition = true;
                break;
            }
        }

        return $condition;
    }

    protected function matrix_ternormalisasi($arrayNilaiBobotByAlternatifId = [])
    {
        $result = [];

        foreach ($arrayNilaiBobotByAlternatifId as $item) {
            $selectedNilaiBobot = DB::table('nilai_bobot')
                ->where('alternatif_id', '=', $item->alternatif_id)
                ->orderBy('kriteria_id')
                ->get();

            $result[] = $selectedNilaiBobot;
        }

        return $result;
    }

    public function create_all()
    {
        $allKriteria = Kriteria::all();
        $allSubkriteria = Subkriteria::all();
        $allAlternatif = Alternatif::all();

        return view('dashboard.nilai_bobot.create_all', compact('allKriteria', 'allSubkriteria', 'allAlternatif'));
    }

    public function store_all(Request $request)
    {
        try {
            // Cek keberadaan data yang sudah terisi
            $existingData = NilaiBobot::whereIn('kriteria_id', $request->kriteria)
                ->where('alternatif_id', $request->alternatif)
                ->first();

            if ($existingData) {
                // Redirect ke halaman create single jika ada data yang sudah terisi
                // return redirect()->route('nilai-bobot.create_single')
                //     ->withErrors('Data dengan kriteria yang sama sudah ada. Mohon masukkan data yang berbeda.');
                return redirect()->route('nilai-bobot.index')
                    ->with(['error'=> 'Data dengan kriteria yang sama sudah ada. Mohon masukkan data yang berbeda.']);
            }

            if (!empty($request->nilai)) {
                // Simpan data baru
                for ($i = 0; $i < count($request->nilai); $i++) {
                    NilaiBobot::create([
                        'nilai' => $request->nilai[$i],
                        'kriteria_id' => (int) $request->kriteria[$i],
                        'alternatif_id' => (int) $request->alternatif,
                    ]);
                }
            }

            return redirect()
                ->route('nilai-bobot.index')
                ->with([
                    'success' => 'Nilai Bobot berhasil dibuat'
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->route('nilai-bobot.index')
                ->withErrors('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }


    // // Create Single Nilai Bobot
    // public function create_single()
    // {
    //     return view('dashboard.nilai_bobot.create_single');
    // }


    public function edit($alternatifId)
    {
        $selectedAlternatif = DB::table('nilai_bobot')
            ->join('alternatif', 'nilai_bobot.alternatif_id', '=', 'alternatif.id')
            ->join('kriteria', 'nilai_bobot.kriteria_id', '=', 'kriteria.id')
            ->select('nilai_bobot.*', 'alternatif.nama', 'alternatif.nama', 'kriteria.name AS kriteria_name', 'kriteria.code AS kriteria_code')
            ->orderBy('kriteria.id')
            ->where('nilai_bobot.alternatif_id', '=', $alternatifId)
            ->get();
        $allSubkriteria = Subkriteria::all();

        return view('dashboard.nilai_bobot.edit', compact('selectedAlternatif', 'allSubkriteria'));
    }

    public function update(Request $request, $alternatifId)
    {
        $nilaiBobot = DB::table('nilai_bobot')
            ->where('alternatif_id', '=', (int) $alternatifId)
            ->orderBy('kriteria_id')
            ->get();

        for ($i = 0; $i < count($nilaiBobot); $i++) {
            DB::table('nilai_bobot')
                ->where('alternatif_id', '=', (int) $alternatifId)
                ->where('kriteria_id', '=', $request->kriteria[$i])
                ->update(['nilai' => $request->nilai[$i]]);
        }

        return redirect()
            ->route('nilai-bobot.index')
            ->with([
                'success' => 'Nilai Bobot berhasil diubah'
            ]);
    }

    public function destroy($alternatif_id)
    {
        NilaiBobot::where('alternatif_id', $alternatif_id)->delete();

        return redirect()->back()->with('success', 'Nilai berhasil dihapus.');
    }
}
