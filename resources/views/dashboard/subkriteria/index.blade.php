@extends('layouts.dashboard')

@section('content')

@section('title')Subkriteria @endsection
<h1 class="mt-4">Subkriteria</h1>
<hr>

@if (Auth::user()->role == 'admin')
<div class="d-flex align-items-center mt-4">
    <a href="{{ route('subkriteria.create') }}">
        <button class="btn btn-success mt-2 mr-2">Tambah Subkriteria</button>
    </a>
</div>
@endif

<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="table-responsive">
            <table class="table table-striped mb-0 table-hover" style="width:100%" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Singkatan Kriteria</th>
                        <th class="text-center">Range</th>
                        <th class="text-center">Nilai</th>
                        @if (Auth::user()->role == 'admin')
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-white text-center">
                    @foreach ($allSubkriteria as $subkriteria)
                    <tr>
                        <td class="font-weight-bold">{{ $loop->iteration }}</td>
                        <td class="font-weight-bold">{{ strtoupper($subkriteria->name) }} (C{{
                            $subkriteria->kriteria_id}})</td>
                        <td>{{ $subkriteria->range }}</td>
                        <td>{{ $subkriteria->nilai }}</td>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('subkriteria.edit', $subkriteria->id) }}"
                                    class="btn btn-warning text-light me-3">Ubah
                                </a>
                                <form method="POST" action="{{ route('subkriteria.destroy', $subkriteria->id) }}"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-xs btn-danger btn-flat" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal{{ $subkriteria->id }}">Hapus
                                    </button>
                                    <div class="modal fade" id="confirmDeleteModal{{ $subkriteria->id }}" tabindex="-1"
                                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data?
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
