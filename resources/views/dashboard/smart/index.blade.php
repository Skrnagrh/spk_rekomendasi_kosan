@extends('layouts.dashboard')

@section('content')
@if ($checkHasEmptyData)
@include('data kosong')

@else

@section('title')Perhitungan @endsection
<h1 class="mt-4">Perhitungan</h1>
<hr>

<section class="header-menu mb-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3">Normalisasi Bobot Kriteria</h5>
        </div>

        <div class="table-responsive">
            <table class="table table-striped mb-0 table-hover" style="width:100%" id="myTable">
                <thead>
                    <tr>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Bobot (W<sub>j</sub>)</th>
                        <th class="text-center">Normalisasi (W<sub>i</sub>)</th>
                    </tr>
                </thead>
                <tbody style="background-color: var(--bg-body)">
                    @foreach ($persentaseBobot as $index => $item)
                    <tr>
                        <td class="text-center">{{ ucwords($item['description']) }} ({{ strtoupper($item['name']) }})
                        </td>
                        <td class="text-center">{{ ucwords($item['type']) }}</td>
                        <td class="text-center">{{ $item['bobot'] }}0</td>
                        <td class="text-center">{{ $item['bobot'] }}0 / {{ $totalBobot }}0 = {{
                            round($item['persentase_bobot'], 3) }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-center font-weight-bold" colspan="2">Total (&Sigma;<i>w<sub>j</sub></i>)</td>
                        <td class="text-center font-weight-bold">{{ $totalBobot }}0</td>
                        <td class="text-center font-weight-bold">{{ array_sum(array_column($persentaseBobot,
                            'persentase_bobot')) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="header-menu mb-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3">Perhitungan Akhir</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-striped mb-0 table-hover" style="width:100%" id="myTable1">
                <thead>
                    <tr>
                        <th class="text-center align-middle" rowspan="3">No</th>
                        <th class="text-center align-middle" rowspan="3">Alternatif</th>
                        @if (!empty($matrixTernormalisasi))
                        <th class="text-center" colspan="{{ count($matrixTernormalisasi[0]) }}">Kriteria</th>
                        @endif
                        <th class="text-center align-middle" rowspan="3">Nilai Total</th>
                    </tr>
                    <tr>
                        @if (!empty($matrixTernormalisasi))
                        @foreach ($matrixTernormalisasi[0] as $kriteria)
                        <th class="text-center">C{{ $loop->index + 1 }} - {{ strtoupper($kriteria['krit_code']) }}</th>
                        @endforeach
                        @endif
                    </tr>

                </thead>

                <tbody class="bg-white">
                        @foreach ($nilaiBobotGroupByAlternatifId as $item)
                        <tr>
                            <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                            <td class="text-center font-weight-bold">A{{ $item->code }}</td>
                            @php $total = 0; @endphp
                            @foreach ($matrixTernormalisasi[$loop->index] as $kriteria )
                            <td class="text-center">{{ round($kriteria['hasil_utiliti'], 3) }} * {{
                                round($hasilBobot[$loop->index]['persentase_bobot'], 3) }}</td>
                            @php $total += round($kriteria['hasil_utiliti'] *
                            $hasilBobot[$loop->index]['persentase_bobot'], 3); @endphp
                            @endforeach
                            <td class="text-center font-weight-bold">{{ $total }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>



        </div>
    </div>
</section>


{{-- <section class="header-menu mb-3">
    <div class="card m-0 border shadow-sm p-3">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="mt-3"><i class="bi bi-table"></i> Hasil Perhitungan Akhir</h5>
        </div>
        <hr class="border-dark">

        <div class="table-responsive">
            <table class="table table-bordered table-hover border-dark">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Code Alternatif</th>
                        <th class="text-center">Hasil</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($hasilPerankingan as $index=>$item)
                    <tr>
                        <td class="text-center">{{ ($index + 1) }}</td>
                        <td class="text-center">A{{ $item['alternatif_code'] }}</td>
                        <td class="text-center">{{ round($item['hasil_perh'], 3) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> --}}

@endif


@endsection
