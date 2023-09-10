@extends('layouts.dashboard')

@section('content')

@section('title')Tambah Subkriteria @endsection
<h1 class="mt-4">Tambah Subkriteria</h1>
<hr>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm p-3">
                <div class="card-content">
                    <form class="form" action="{{ route('subkriteria.index') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-group col-md-12">
                                    <label for="kriteria">Pilih Kriteria</label>
                                    <div class="input-group mb-3">
                                        <select class="form-select @error('selectedKriteria') is-invalid @enderror"
                                            id="kriteria_id" name="kriteria_id" wire:model="selectedKriteria" autofocus>
                                            <option value="" selected>Pilih Kriteria...</option>
                                            @foreach ($allKriteria as $kriteria)
                                            <option value="{{ $kriteria->id }}">{{
                                                ucwords($kriteria->description)
                                                }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('selectedKriteria')
                                    @include('layouts.partial.invalid-form', ['message' => $message])
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row align-items-center mt-3">
                            <div class="col-12">
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="range">Range</label>
                                        <input type="text" id="range"
                                            class="form-control @error('range') is-invalid @enderror" name="range"
                                            placeholder="Range" required value="{{ old('range') }}">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="nilai">Nilai</label>
                                        <select class="form-select @error('nilai') is-invalid @enderror" id="nilai"
                                            name="nilai">
                                            <option value="" selected>Pilih Kriteria...</option>
                                            @for ($i = 1; $i <= 5; $i++) <option value='{{ $i }}'>{{ $i }}
                                                </option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('subkriteria.index') }}" class="btn btn-secondary mt-4 me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection