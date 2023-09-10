<div class="modal fade" id="editpassword"  data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kata Sandi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/password" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="old-password-input">Kata Sandi Lama</label>
                        <div class="input-group">
                            <input id="old-password-input" class="form-control" type="password" name="old_password"
                                placeholder="Kata Sandi Lama" />
                            <button id="old-password-toggle" class="btn btn-outline-secondary" type="button"
                                onclick="togglePasswordVisibility('old-password-input')">
                                <i id="old-password-icon" class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="new-password-input">Kata Sandi Baru</label>
                        <div class="input-group">
                            <input id="new-password-input" class="form-control" type="password" name="new_password"
                                placeholder="Kata Sandi Baru" />
                            <button id="new-password-toggle" class="btn btn-outline-secondary" type="button"
                                onclick="togglePasswordVisibility('new-password-input')">
                                <i id="new-password-icon" class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="confirm-password-input">Konfirmasi Kata Sandi Baru</label>
                        <div class="input-group">
                            <input id="confirm-password-input" class="form-control" type="password"
                                name="new_password_confirmation" placeholder="Konfirmasi Kata Sandi Baru" />
                            <button id="confirm-password-toggle" class="btn btn-outline-secondary" type="button"
                                onclick="togglePasswordVisibility('confirm-password-input')">
                                <i id="confirm-password-icon" class="far fa-eye-slash"></i>
                            </button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script>
    function togglePasswordVisibility(inputId) {
                            var input = document.getElementById(inputId);
                            var toggleButton = document.getElementById(inputId + '-toggle');
                            var toggleIcon = toggleButton.querySelector('i');

                            if (input.type === 'password') {
                                input.type = 'text';
                                toggleIcon.classList.remove('fa-eye-slash');
                                toggleIcon.classList.add('fa-eye');
                            } else {
                                input.type = 'password';
                                toggleIcon.classList.remove('fa-eye');
                                toggleIcon.classList.add('fa-eye-slash');
                            }
                        }
</script>
