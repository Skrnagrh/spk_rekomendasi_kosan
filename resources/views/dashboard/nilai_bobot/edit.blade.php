@extends('layouts.dashboard')

@section('content')

@section('title')Ubah Nilai Bobot @endsection
<h1 class="mt-4">Ubah Nilai Bobot</h1>
<hr>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm p-3">
                <div class="card-content">
                    <form class="form form-vertical"
                        action="{{ route('nilai-bobot.update', $selectedAlternatif[0]->alternatif_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="alternatif">Alternatif</label>
                                        <input type="hidden" name="alternatif" id="alternatif"
                                            value="{{ $selectedAlternatif[0]->alternatif_id }}">
                                        <input type="text" id="alternatif_view"
                                            class="form-control @error('alternatif') is-invalid @enderror"
                                            name="alternatif_view" readonly
                                            value="A{{ ucwords($selectedAlternatif[0]->id) }} - ({{ strtoupper($selectedAlternatif[0]->nama) }})">
                                        @error('alternatif')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>

                                    <h6 class="my-3">Kriteria</h6>
                                    @foreach ($selectedAlternatif as $key => $item)
                                    <input type="hidden" name="kriteria[]" value={{ $item->kriteria_id
                                    }}>
                                    <div class="form-group mb-3">
                                        <label for="nilai">C{{ strtoupper($item->kriteria_code) }} - {{ strtoupper($item->kriteria_name)
                                            }}</label>
                                        <select class="form-select @error('nilai.' . $key) is-invalid @enderror"
                                            id="nilai" name="nilai[]" required>
                                            @foreach ($allSubkriteria as $subkriteria)
                                            @if ($item->kriteria_id ==
                                            $subkriteria->kriteria_id)
                                            <option value="{{ $subkriteria->nilai }}" {{ $item->
                                                nilai == $subkriteria->nilai ? 'selected' : ''
                                                }}>
                                                {{ $subkriteria->range }}</option>
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
                                <div class="col-12 d-flex justify-content-end mt-3">
                                    <a href="{{ route('nilai-bobot.index') }}" class="btn btn-secondary me-1 mb-1">
                                        Kembali</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Data</button>
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
