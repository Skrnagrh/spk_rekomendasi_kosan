<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allAlternatif = Alternatif::all();
        return view('dashboard.alternatif.index', compact('allAlternatif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $lastValueCode = DB::table('alternatif')->orderBy('code', 'desc')->first();
        $code = is_null($lastValueCode) ? 1 : $lastValueCode->code + 1;

        $request->validate([
            'image' => 'image|max:1024',
        ]);

        $alternatif = Alternatif::create([
            'code' => $code,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'harga' => $request->harga,
            'gander' => $request->gander,
        ]);

        if ($request->file('image')) {
            $alternatif['image'] = $request->file('image')->store('alternatif-images');
            $alternatif->save();
        }

        if ($alternatif) {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'success' => 'Alternatif berhasil dibuat'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'warning' => 'Alternatif gagal dibuat'
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['alternatif'] = Alternatif::findOrFail($id);
        return view('dashboard.alternatif.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif)
    {
        return view('dashboard.alternatif.edit', [
            'alternatif' => $alternatif,
            'title' => 'alternatif',

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        $request->validate([
            'image' => 'image|max:1024',
        ]);

        $alternatif->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'harga' => $request->harga,
            'gander' => $request->gander,
        ]);

        // ini buat update gambar
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $alternatif['image'] = $request->file('image')->store('alternatif-images');
            $alternatif->save();
        }

        if ($alternatif) {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'success' => 'Alternatif berhasil diubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Alternatif gagal diubah'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();

        if ($alternatif) {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'success' => 'Alternatif berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('alternatif.index')
                ->with([
                    'error' => 'Alternatif gagal dihapus'
                ]);
        }
    }
}
