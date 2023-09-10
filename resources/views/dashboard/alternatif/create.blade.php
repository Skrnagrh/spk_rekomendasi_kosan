@extends('layouts.dashboard')

@section('content')

@section('title')Tambah Alternatif @endsection
<h1 class="mt-4">Tambah Alternatif</h1>
<hr>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-12">
            <div class="card m-0 border shadow-sm px-3">
                                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('alternatif.index') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">

                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="nama">Nama Kosan</label>
                                            <input type="text" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                required placeholder="Nama Kosan" value="{{ old('nama') }}" autofocus>
                                        </div>
                                        @error('nama')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text" id="harga"
                                                class="form-control @error('harga') is-invalid @enderror" name="harga"
                                                required placeholder="Harga" value="{{ old('harga') }}" autofocus>
                                        </div>
                                        @error('harga')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="gander">Tipe Kosan</label>
                                            <select id="gander"
                                                class="form-control @error('gander') is-invalid @enderror" name="gander"
                                                required>
                                                <option value="putra" {{ old('gander')==='putra' ? 'selected' : '' }}>
                                                    Putra</option>
                                                <option value="putri" {{ old('gander')==='putri' ? 'selected' : '' }}>
                                                    Putri</option>
                                                <option value="putra/putri" {{ old('gander')==='putra/putri'
                                                    ? 'selected' : '' }}>Putra/Putri</option>
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
                                                class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                                placeholder="Deskripsi"
                                                style="max-height: 30px">{{ old('alamat') }}</textarea>
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
                                                class="form-control @error('nohp') is-invalid @enderror" name="nohp"
                                                placeholder="Nomor Handphone" required value="{{ old('nohp') }}">
                                        </div>
                                        @error('code_curug')
                                        @include('layouts.partial.invalid-form', ['message' => $message])
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="image">Poto Kosan</label>
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" name="image" onchange="previewImage()">
                                        <div class="file-size"></div>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>



                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('alternatif.index') }}" class="btn btn-secondary me-1 mb-1">
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
    </div>
</section>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
