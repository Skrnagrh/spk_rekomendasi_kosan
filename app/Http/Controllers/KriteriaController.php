<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allKriteria = Kriteria::all();
        return view('dashboard.kriteria.index', compact('allKriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lastValueCode = DB::table('kriteria')->orderBy('code', 'desc')->first();
        $code = is_null($lastValueCode) ? 1 : $lastValueCode->code + 1;
        $bobot = (float)$request->bobot;

        $kriteria = Kriteria::create([
            'code' => $code,
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'bobot' => $bobot,
        ]);

        if ($kriteria) {
            return redirect()
                ->route('kriteria.index')
                ->with([
                    'success' => 'Kriteria berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Kriteria gagal dibuat'
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria, $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('dashboard.kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $bobot = (float)$request->bobot;

        $kriteria->update([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'bobot' => $bobot,
        ]);

        if ($kriteria) {
            return redirect()
                ->route('kriteria.index')
                ->with([
                    'success' => 'Kriteria berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Kriteria gagal diubah'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria, $id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        if ($kriteria) {
            return redirect()
                ->route('kriteria.index')
                ->with([
                    'success' => 'Kriteria berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('kriteria.index')
                ->with([
                    'error' => 'Kriteria gagal dihapus'
                ]);
        }
    }
}
