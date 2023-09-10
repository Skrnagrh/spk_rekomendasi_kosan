@extends('layouts.dashboard')

@section('content')


@section('title')Profile {{ auth()->user()->name }} @endsection
<h1 class="mt-4">Profile {{ auth()->user()->name }}</h1>
<hr>

<div class="col-md-5 mt-2">
    <div class="card  shadow">
        <div class="card-body">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item mt-2" href="{{ route('profile.edit') }}" data-bs-toggle="modal"
                data-bs-target="#userprofileEdit">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Edit Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item mt-2" data-bs-toggle="modal" data-bs-target="#editpassword">
                <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                Ubah Password
            </a>

            <div class="dropdown-divider"></div>
            @include('dashboard.profile.password')
            @include('dashboard.profile.edit')
        </div>
    </div>
</div>

@include('sweetalert::alert')
<style>
    input[type='file'] {
        color: rgba(0, 0, 0, 0)
    }
</style>

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

{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userprofileEdit">
    Launch static backdrop modal
</button> --}}