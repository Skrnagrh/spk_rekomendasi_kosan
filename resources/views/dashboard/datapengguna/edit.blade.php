<div class="modal fade" id="penggunaedit{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data
                    Pengguna
                </h1>
            </div>
            <form method="post" action="{{ route('datapengguna.update', $user->id) }}" class="mb-3"
                id="editdatapetugas" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="modal-body justify-content-start">

                    <div class="mb-3">
                        <label for="name" class="form-label text-dark">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ $user->name }}" placeholder="Nama Lengkap" min="1"
                            maxlength="10">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">Alamat Email</label>
                        <input type="text" class="form-control" id="email" name="email" required
                            value="{{ $user->email }}" placeholder="Alamat Email">

                    </div>


                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">Jabatan</label></label>
                        <div class="col-sm-12">
                            <select class="form-select" name="role">
                                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff
                                </option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
