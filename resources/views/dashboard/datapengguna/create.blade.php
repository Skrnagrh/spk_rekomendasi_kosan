<div class="modal fade" id="mocreat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-dark" id="exampleModalLabel">Register Pengguna Baru
                </h3>
                <i class="bi bi-x-lg text-danger" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form method="post" action="/datapengguna" class="mb-3" enctype="multipart/form-data" id="createsuratmasuk">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label text-dark">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" min="1" maxlength="10">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label text-dark">Alamat Email</label>
                        <input type="text" class="form-control" id="email" name="email" required
                            value="{{ old('email') }}" placeholder="Alamat Email">

                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">Jabatan</label></label>
                        <div class="col-sm-12">
                            <select class="form-select" name="role">
                                <option value="staff" @if(old('role')=='staff' ) selected @endif>Staff</option>
                                <option value="admin" @if(old('role')=='admin' ) selected @endif>Admin</option>
                            </select>

                        </div>
                    </div>

                    <label for="password" class="form-label text-dark">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required autofocus value="{{ old('password') }}"
                            placeholder="Password" style="height: 40px;">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePasswordVisibility()" style="height: 40px;">
                                <i id="togglePasswordIcon" class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror





                    <script>
                        function togglePasswordVisibility() {
                            var passwordInput = document.getElementById("password");
                            var togglePasswordIcon = document.getElementById("togglePasswordIcon");

                            if (passwordInput.type === "password") {
                                passwordInput.type = "text";
                                togglePasswordIcon.classList.remove("fa-eye-slash");
                                togglePasswordIcon.classList.add("fa-eye");
                            } else {
                                passwordInput.type = "password";
                                togglePasswordIcon.classList.remove("fa-eye");
                                togglePasswordIcon.classList.add("fa-eye-slash");
                            }
                        }
                    </script>




                </div>

                <div class="modal-footer">
                    <a class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
