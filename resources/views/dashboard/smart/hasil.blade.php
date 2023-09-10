@extends('layouts.dashboard')

@section('content')
@if ($checkHasEmptyData)
@include('data kosong')

@else

@section('title')Prangkingan @endsection
<h1 class="mt-4">Prangkingan</h1>
<hr>

<section class="header-menu mb-3">
    <div class="card m-0 border shadow-none p-3">
        <div class="table-responsive">
            <table class="table table-striped mb-0 table-hover" style="width:100%" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">Ranking</th>
                        <th class="text-center">Alternatif</th>
                        <th class="text-center">Nama Kosan</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Handphone</th>
                        <th class="text-center">Hasil</th>
                        <th class="text-center">Detail</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($hasilPerankingan as $index=>$item)
                    <tr>
                        <td class="text-center font-weight-bold">{{ ($index + 1) }}</td>
                        <td class="text-center font-weight-bold">A{{ $item['alternatif_code'] }}</td>
                        <td class="text-center">{{ strtoupper($item['nama']) }}</td>
                        <td class="text-center">{{ ucwords($item['nohp']) }}</td>
                        <td class="text-center">{{ ucwords($item['alamat']) }}</td>
                        <td class="text-center">{{ round($item['hasil_rank'], 3) }}</td>
                        <td><a href="{{ route('alternatif.show', $item['alternatif_code']) }}"
                                class="btn btn-primary text-light btn-sm me-3 btn-flat">
                                <i class="bi bi-eye-fill"></i> Detail
                            </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif
@endsection
