@extends('layouts.dashboard')

@section('content')
<style>
    .colom-kartu {
        /* margin-top: -20%; */
        border: none
    }

    .colom-kartu-1 {
        margin-top: -13%;
        border: none
    }

    .kartu {
        width: 80px;
        height: 50px;
        justify-content: center;
        text-align: center;
        border: none
    }

    a {
        text-decoration: none
    }
</style>

@section('title')Dashboard @endsection
<h1 class="mt-4 text-capitalize">Dashboard {{ auth()->user()->name }}</h1>
<hr>

<div class="row">
    <div class="col-md-3 mt-5">
        <a href="/dashboard/alternatif" class="text-danger">
            <div class="shadow p-3 bg-body-tertiary rounded" style="height: 100%">
                <div class="row justify-content-between">
                    <div class="col-md-3 colom-kartu">
                        <div class="card shadow kartu bg-danger text-light">
                            <i class="fas fa-house"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="text-end pt-1">
                            <h5 class="text-sm mb-0 text-capitalize">Alternatif</h5>
                            <p class="text-sm mb-0 text-capitalize">{{ $alternatif }} Kosan</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mt-5">
        <a href="/dashboard/kriteria" class="text-dark">
            <div class="shadow p-3 bg-body-tertiary rounded" style="height: 100%">
                <div class="row justify-content-between">
                    <div class="col-md-3 colom-kartu">
                        <div class="card shadow kartu bg-dark text-light">
                            <i class="fas fa-database"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="text-end pt-1">
                            <h5 class="text-sm mb-0 text-capitalize">Kriteria</h5>
                            <p class="text-sm mb-0 text-capitalize">{{ $kriteria }} Kriteria</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mt-5">
        <a href="/dashboard/subkriteria" class="text-success">
            <div class="shadow p-3 bg-body-tertiary rounded" style="height: 100%">
                <div class="row justify-content-between">
                    <div class="col-md-3 colom-kartu">
                        <div class="card shadow kartu bg-success text-light">
                            <i class="fas fa-database"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="text-end pt-1">
                            <h5 class="text-sm mb-0 text-capitalize">Subkriteria</h5>
                            <p class="text-sm mb-0 text-capitalize">{{ $subkriteria }} Subkriteria</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 mt-5">
        <a href="/dashboard/hasil" class="text-primary">
            <div class="shadow p-3 bg-body-tertiary rounded" style="height: 100%">
                <div class="row justify-content-between">
                    <div class="col-md-3 colom-kartu">
                        <div class="card shadow kartu bg-primary text-light">
                            <i class="fas fa-award"></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="text-end pt-1">
                            <h5 class="text-sm mb-0 text-capitalize">Perangkingan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-12 my-5">
        <div class="shadow p-3 bg-body-tertiary rounded" style="height: 100%">
            <div class="row justify-content-between">
                <div class="col-md-3 colom-kartu">
                    <img src="/beranda/assets/img/house.png" width=150px />
                </div>
                <div class="col-md-9">
                    <div class="text-end pt-1">
                        <h1 class="text-sm mb-3 text-capitalize">Selamat Datang di Aplikasi SPK Rekomendasi Kosan</h1>
                        <p class="text-sm mb-0 text-capitalize">Sekarang, jika Anda mencari kosan, Anda tidak perlu repot-repot lagi, teman-teman. Cukup buka aplikasi ini, dan aplikasi ini akan memberikan rekomendasi yang terbaik untuk Anda. Semoga Anda menyukainya!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@include('sweetalert::alert')
@endsection
