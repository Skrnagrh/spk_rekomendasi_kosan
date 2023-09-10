@extends('layouts.dashboard')

@section('content')

@section('title')Ubah Alternatif @endsection
<h1 class="mt-4">Ubah Alternatif {{ $alternatif->nama }}</h1>
<hr>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 shadow-sm px-3">
                <div class="card-content">
                    <div class="card-body pt-3">

                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <form class="form form-vertical"
                                    action="{{ route('alternatif.update', $alternatif->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="nama">Nama Kosan</label>
                                                    <input type="text" id="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        name="nama" required value="{{ old('nama',$alternatif->nama) }}"
                                                        placeholder="Nama Kosan" autofocus>
                                                    @error('nama')
                                                    @include('layouts.partial.invalid-form', ['message' =>
                                                    $message])
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <input type="text" id="harga"
                                                        class="form-control @error('harga') is-invalid @enderror"
                                                        name="harga" required placeholder="Harga"
                                                        value="{{ old('harga', $alternatif->harga ) }}" autofocus>
                                                </div>
                                                @error('harga')
                                                @include('layouts.partial.invalid-form', ['message' => $message])
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="gander">Tipe Kosan</label>
                                                    <select id="gander"
                                                        class="form-control @error('gander') is-invalid @enderror"
                                                        name="gander" required>
                                                        <option value="putra" {{ $alternatif->gander == 'putra' ?
                                                            'selected' : '' }}>Putra
                                                        </option>
                                                        <option value="putri" {{ $alternatif->gander == 'putri' ?
                                                            'selected' : '' }}>Putri
                                                        </option>
                                                        <option value="putra/putri" {{ $alternatif->gander ==
                                                            'putra/putri' ? 'selected' : '' }}>Putra/Putri
                                                        </option>
                                                    </select>
                                                </div>
                                                @error('gander')
                                                @include('layouts.partial.invalid-form', ['message' => $message])
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <textarea id="alamat"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        name="alamat" placeholder="Alamat"
                                                        style="max-height: 30px">{{ $alternatif->alamat }}</textarea>
                                                    @error('alamat')
                                                    @include('layouts.partial.invalid-form', ['message' =>
                                                    $message])
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="nohp">Nomor Handphone</label>
                                                    <input type="text" id="nohp"
                                                        class="form-control @error('nohp') is-invalid @enderror"
                                                        name="nohp" required value="{{ $alternatif->nohp }}"
                                                        placeholder="Nomor Handphonea">
                                                    @error('nohp')
                                                    @include('layouts.partial.invalid-form', ['message' =>
                                                    $message])
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label " for="image">Poto Kosan</label>
                                                <input type="hidden" name="oldImage" value="{{ $alternatif->image }}">
                                                @if ($alternatif->image)
                                                <img src="{{ asset('storage/' . $alternatif->image) }}"
                                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                @endif
                                                <input type="file"
                                                    class="form-control @error('image') is-invalid @enderror" id="image"
                                                    name="image" onchange="previewImage()">
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <a href="{{ route('alternatif.index') }}"
                                                    class="btn btn-secondary me-1 mb-1"> Kembali</a>
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>



                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
