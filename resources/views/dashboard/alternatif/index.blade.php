@extends('layouts.dashboard')

@section('content')

@section('title') Alternatif @endsection
<h1 class="mt-4">Alternatif</h1>
<hr>

@if (Auth::user()->role == 'admin')
<div>
    <a href="{{ route('alternatif.create') }}"><button class="btn btn-success mt-4">Tambah
            Alternatif</button></a>
</div>
@endif

<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="table-responsive">
            <table class="table table-striped mb-0 table-hover" style="width:100%" id="myTable">
                <thead class="bg-white text-center">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Alternatif</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Nomor Handphone</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-center">
                    @foreach ($allAlternatif as $alternatif)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>A{{ $alternatif->code }}</td>
                        <td>{{ ucwords($alternatif->nama) }}</td>
                        <td>{{ ucwords($alternatif->alamat) }}</td>
                        <td>{{ strtoupper($alternatif->nohp) }}</td>
                        <td>
                            <a href="{{ route('alternatif.show', $alternatif->id) }}"
                                class="btn btn-primary text-light btn-flat">Lihat
                            </a>

                            @if (Auth::user()->role == 'admin')
                            <a href="{{ route('alternatif.edit', $alternatif->id) }}"
                                class="btn btn-warning text-light btn-flat">Ubah
                            </a>

                            <form method="POST" action="{{ route('alternatif.destroy', $alternatif->id) }}"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-danger btn-flat" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $alternatif->id }}">Hapus
                                </button>
                                <div class="modal fade" id="confirmDeleteModal{{ $alternatif->id }}" tabindex="-1"
                                    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data {{ $alternatif->nama }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection
