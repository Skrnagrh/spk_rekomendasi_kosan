@extends('layouts.dashboard')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@section('content')

@section('title')Detail Alternatif @endsection
<h1 class="mt-4">Detail Alternatif</h1>
<hr>

<section class="section profile">
    <div class="row mb-5 mt-3">
        <div class="col-lg-12">

            <div class="card shadow" style="width: 25rem;">
                <div class="text-center">
                    @if ($alternatif->image)
                    <img src="{{ asset('storage/' . $alternatif->image) }}" class="card-img-top">
                    @else
                    <img src="/dashboard/assets/img/notfound.png" class="card-img-top" style="max-height: 300px">
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('alternatif.edit', $alternatif->id) }}"
                        class="btn btn-warning text-light me-3 mt-3">Ubah</a>
                    @endif
                    @endif
                </div>
                <div class="card-body">
                    <h4 class="card-title text-capitalize text-primary">{{ $alternatif->nama }}</h4>
                    <p>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($alternatif->alamat) }}"
                            target="_blank" class="text-decoration-none text-sm">
                            <i class="bi bi-geo-alt-fill"></i> Alamat |
                        </a>
                        <a href="https://wa.me/{{ $alternatif->nohp }}?text=Assalamualaikum" target="_blank"
                            class="text-decoration-none text-sm">
                            <i class="bi bi-whatsapp"></i> Whatsapp |
                        </a>
                        <a href="tel:{{ $alternatif->nohp }}" class="text-decoration-none text-sm">
                            <i class="bi bi-telephone-fill"></i> Telephone
                        </a>
                    </p>
                    <p
                        class="btn {{ $alternatif->gander === 'putra' ? 'bg-success' : ($alternatif->gander === 'putri' ? 'bg-danger' : 'bg-info') }} text-light">
                        {{ $alternatif->gander }}</p>

                    <p class="card-text">{{ $alternatif->alamat }}</p>
                    <p class="card-text text-weight-bold">Rp {{ $alternatif->harga }}</p>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
