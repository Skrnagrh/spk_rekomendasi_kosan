<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $selectedKriteria = null;
    public $allSubkriteriaByKriteriaId = null;

    public $kriteriaId;
    public $subkriteriaId = null;
    public $isFormActive = false;
    public $rangeForm = null;
    public $nilaiForm = null;

    protected $rules = [
        'subkriteriaId' => ['required', 'numeric'],
        'rangeForm' => ['required', 'string', 'max:255'],
        'nilaiForm' => ['required', 'numeric', 'between:1,5'],
    ];

    public function index()
    {
        $allSubkriteria = DB::table('subkriteria')
            ->join('kriteria', 'subkriteria.kriteria_id', '=', 'kriteria.id')
            ->select('subkriteria.*', 'kriteria.name')
            ->orderBy('subkriteria.kriteria_id')
            ->orderBy('nilai')
            ->get();
        return view('dashboard.subkriteria.index', compact('allSubkriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allKriteria = DB::table('kriteria')->select('id', 'name', 'code', 'description')->get();
        return view('dashboard.subkriteria.create', compact('allKriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        try {
            $subkriteria = Subkriteria::create([
                'range' =>  $request->range,
                'nilai' =>  $request->nilai,
                'kriteria_id' =>  $request->kriteria_id,
            ]);

            if ($subkriteria) {
                return redirect()
                    ->route('subkriteria.index')
                    ->with([
                        'success' => 'subkriteria berhasil dibuat'
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'subkriteria gagal dibuat'
                    ]);
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorCode = $exception->errorInfo[1];

            // Check if the error is due to duplicate entry
            if ($errorCode === 1062) {
                return redirect()
                    ->route('subkriteria.index')
                    ->with([
                        'error' => 'Data gagal ditambahkan. Subkriteria dengan nilai yang sama sudah ada.'
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Subkriteria gagal dibuat'
                    ]);
            }
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Subkriteria $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subkriteria $subkriteria, $id)
    {
        $allKriteria = Kriteria::all();
        $subkriteria = Subkriteria::findOrFail($id);
        return view('dashboard.subkriteria.edit', compact('subkriteria', 'allKriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subkriteria $subkriteria)
    {
        $nilai = $request->nilai;
        $kriteriaId = $request->kriteria_id;
        $range = $request->range;

        $subkriteria = Subkriteria::updateOrCreate(
            ['nilai' => $nilai, 'kriteria_id' => $kriteriaId],
            ['range' => $range]
        );

        if ($subkriteria) {
            return redirect()
                ->route('subkriteria.index')
                ->with('success', 'Subkriteria berhasil diubah');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Subkriteria gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subkriteria $subkriteria, $id)
    {
        $subkriteria = Subkriteria::findOrFail($id);
        $subkriteria->delete();

        if ($subkriteria) {
            return redirect()
                ->route('subkriteria.index')
                ->with([
                    'success' => 'Subkriteria berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('subkriteria.index')
                ->with([
                    'error' => 'Subkriteria gagal dihapus'
                ]);
        }
    }
}
