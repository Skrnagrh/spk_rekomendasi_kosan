@extends('layouts.dashboard')

@section('content')

@section('title')Kriteria @endsection
<h1 class="mt-4">Kriteria</h1>
<hr>

@if (Auth::user()->role == 'admin')
<div class="d-flex align-items-center justify-content-start">
    <a href="{{ route('kriteria.create') }}"><button class="btn btn-success mt-4">Tambah Kriteria</button></a>
</div>
@endif

<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="table-responsive">
            <table class="table table-striped mb-0 table-hover" style="width:100%" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Tipe</th>
                        <th class="text-center">Bobot</th>
                        @if (Auth::user()->role == 'admin')
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($allKriteria as $kriteria)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>C{{ $kriteria->code }}</td>
                        <td>{{ strtoupper($kriteria->name) }}</td>
                        <td>{{ ucwords($kriteria->description) }}</td>
                        <td>{{ ucwords($kriteria->type) }}</td>
                        <td>{{ $kriteria->bobot }}0</td>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('kriteria.edit', $kriteria->id) }}"
                                    class="btn btn-warning me-3  text-light"> Ubah
                                </a>


                                <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmationModal{{ $kriteria->id }}"> Hapus
                                    </button>

                                    <!-- Modal Konfirmasi -->
                                    <div>
                                        <div class="modal fade" id="confirmationModal{{ $kriteria->id }}" tabindex="-1"
                                            aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmationModalLabel">Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus kriteria {{
                                                            ucwords($kriteria->description) }}?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
