@extends('layouts.dashboard')

@section('content')

@section('title')Tambah Nilai Bobot @endsection
<h1 class="mt-4">Tambah Nilai Bobot</h1>
<hr>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow p-3">
                <div class="card-content">
                    <form class="form form-vertical" action="{{ route('nilai-bobot.store_all') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="alternatif">Alternatif</label>
                                        <select class="form-select @error('alternatif') is-invalid @enderror"
                                            id="alternatif" name="alternatif" required>
                                            <option value="" selected>Pilih Alternatif </option>
                                            @foreach ($allAlternatif as $alternatif)
                                            <option value='{{ $alternatif->id }}'>
                                                {{ strtoupper($alternatif->nama) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('alternatif')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>

                                    <h6 class="mt-3">Kriteria</h6>
                                    <div class="row match-height mb-3">
                                        <div class="col-12">
                                            @foreach ($allKriteria as $key => $kriteria)
                                            <input type="hidden" name="kriteria[]" value={{ $kriteria->id
                                            }}>
                                            <div class="form-group">
                                                <label for="nilai" class="m-2">C{{ $kriteria->code
                                                    }} - {{ $kriteria->description }}</label>
                                                <select class="form-select @error('nilai.' . $key) is-invalid @enderror"
                                                    id="nilai" name="nilai[]" required>
                                                    <option value="" selected>Pilih  {{
                                                        ucwords($kriteria->description)
                                                        }}</option>
                                                    @foreach ($allSubkriteria as $subkriteria)
                                                    @if ($kriteria->id == $subkriteria->kriteria_id)
                                                    <option value="{{ $subkriteria->nilai }}">{{
                                                        $subkriteria->range }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('nilai.' . $key)
                                                @include('layouts.partial.invalid-form', ['message' =>
                                                $message])
                                                @enderror
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>



                                </div>
                                <div class="col-12 d-flex justify-content-end mt-3">
                                    <a href="{{ route('nilai-bobot.index') }}" class="btn btn-secondary me-1 mb-1">
                                        Kembali</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
