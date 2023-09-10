{{-- <div class="modal fade" id="userprofileEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true"> --}}
<div class="modal fade" id="userprofileEdit" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <div class="row">

                        {{-- <div class="col-md-5">
                            @if ($user->image)
                            <img src="{{ asset('storage/images/' . $user->image) }}"
                                class="img-preview img-thumbnail rounded mx-auto d-block mb-3" style="height: 210px">
                            @else
                            <img class="img-preview img-thumbnail rounded mx-auto d-block mb-3" src="/default.png"
                                style="height: 210px">
                            @endif
                            <input type='file' id="image" type="file" name="image" onchange="previewImage()" />
                        </div> --}}

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name" class="col-md-12 col-form-label">Nama Lengkap</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ $user->name }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="col-md-12 col-form-label">Alamat Email</label>
                                <div class="col-md-12">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
