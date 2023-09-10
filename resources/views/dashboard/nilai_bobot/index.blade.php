@extends('layouts.dashboard')

@section('content')

@section('title')Nilai Bobot @endsection
<h1 class="mt-4">Nilai Bobot</h1>
<hr>

@if (Auth::user()->role == 'admin')
<div>
    <a href="{{ route('nilai-bobot.create_all') }}"><button class="btn btn-success mt-3">Tambah Nilai
            Bobot </button></a>
</div>
@endif

<section class="header-menu my-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="table-responsive">
            <table class="table table-striped mb-0 table-hover" style="width:100%" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center p-2 align-middle" rowspan="2">No</th>
                        <th class="text-center p-2 align-middle" rowspan="2">Kode Alternatif</th>
                        <th class="text-center p-2 align-middle" rowspan="2">Nama</th>
                        <th class="text-center p-2" colspan="{{ count($allKriteria) }}">Kriteria</th>
                        @if (Auth::user()->role == 'admin')
                        <th class="text-center p-2 align-middle" rowspan="2">Aksi</th>
                        @endif
                    </tr>
                    <tr>
                        @foreach ($allKriteria as $kriteria)
                        <th class="text-center">(C{{ $kriteria->code }})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($allDataProcessed as $item)
                    <tr>
                        <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                        <td class="text-center font-weight-bold">A{{ $item->code }}</td>
                        <td>{{ $item->nama }}</td>
                        @php
                        $hasEmptyData = false;
                        for ($i = 0; $i < count($allKriteria); $i++) { if (is_string($item->
                            dataKriteria[$i]['nilaiBobot']) || $item->dataKriteria[$i]['nilaiBobot'] === '') {
                            $hasEmptyData = true;
                            break;
                            }
                            }
                            @endphp
                            @for ($i = 0; $i < count($allKriteria); $i++) @if (is_string($item->
                                dataKriteria[$i]['nilaiBobot']))
                                <td class="text-danger text-center"><i>{{ $item->dataKriteria[$i]['nilaiBobot'] }}</i>
                                </td>
                                @else
                                <td class="text-cente">{{ $item->dataKriteria[$i]['nilaiBobot'] }}0</td>
                                @endif
                                @endfor
                                @if (Auth::user()->role == 'admin')
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('nilai-bobot.edit', ['alternatif_id' => $item->alternatif_id]) }}"
                                            class="btn btn-warning me-2 text-light"> Ubah
                                        </a>

                                        <form
                                            action="{{ route('nilai-bobot.destroy', ['alternatif_id' => $item->alternatif_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmationModal{{ $item->alternatif_id }}">Hapus
                                            </button>

                                            <!-- Confirmation Modal -->
                                            <div class="modal fade" id="confirmationModal{{ $item->alternatif_id }}"
                                                tabindex="-1" aria-labelledby="confirmationModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmationModalLabel">
                                                                Hapus Data Nilai Bobot</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> Apakah Anda yakin ingin menghapus data</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="modal"><i class="bi bi-x-lg"></i>
                                                                Batal</button>
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="bi bi-trash"></i>
                                                                Ya, Hapus</button>
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
