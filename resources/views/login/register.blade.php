<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SPK Rekomdasi Kosan | Register</title>
    <link rel="icon" type="image/x-icon" href="/beranda/assets/img/house.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link href="/beranda/assets/css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="/login/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/login/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/login/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body id="page-top" style="background-image: url('/beranda/assets/img/kos.jpg')">
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row row-cols-2 gx-4 gx-lg-5 h-100 align-items-center justify-content-center">
                <div class="col-lg-6  align-self-baseline text-center">
                    <h1 class="text-white font-weight-bold">Daftar</h1>
                    <img src="/beranda/assets/img/house.png" width=200px />
                    <p class="text-white">Sistem Pendukung Keputusan Rekomendasi Kosan Terbaik</p>
                </div>
                <div class="col-lg-5 align-self-baseline">
                    <div class="card">
                        <div class="card-body login-card-body">
                            <div class="row justify-content-center text-center">
                                <div class="col-md-6">
                                    <img src="/beranda/assets/img/house.png" width=100px style="margin-top: -80px" />
                                </div>
                            </div>
                            <form action="/register" method="post">
                                @csrf
                                <label class="mt-4">Nama Lengkap</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap"
                                        value="{{ old('name') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>

                                <label>Alamat Email</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="email" placeholder="Alamat Email"
                                        value="{{ old('email') }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>

                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password" id="passwordInput"
                                        placeholder="Password" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span id="togglePassword" class="fas fa-eye-slash"
                                                onclick="togglePasswordVisibility('passwordInput')"></span>
                                            <span class="fas fa-lock" style="margin-left: 5px;"></span>
                                        </div>
                                    </div>
                                </div>

                                <label for="password_confirmation">Konfirmasi Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="passwordConfirmationInput"
                                        name="password_confirmation" placeholder="Konfirmasi Password" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span id="toggleConfirmation" class="fas fa-eye-slash"
                                                onclick="toggleConfirmationVisibility('passwordConfirmationInput')"></span>
                                            <span class="fas fa-lock" style="margin-left: 5px;"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label for="" class="text-center mb-4">Sudah punya akun? <a href="/login"> Masuk
                                        </a></label>
                                    <div class="col-6">
                                        <a href="/" class="btn btn-secondary btn-block btn-flat">
                                            <b> Batal</b>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                                            <b> Daftar</b>
                                        </button>
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="/login/plugins/jquery/jquery.min.js"></script>
    <script src="/login/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/login/dist/js/adminlte.min.js"></script>
    <script src="/login/plugins/alert.js"></script>

    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var togglePassword = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.classList.remove("fa-eye-slash");
                togglePassword.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                togglePassword.classList.remove("fa-eye");
                togglePassword.classList.add("fa-eye-slash");
            }
        }

        function toggleConfirmationVisibility(inputId) {
            var confirmationInput = document.getElementById(inputId);
            var toggleConfirmation = document.getElementById("toggleConfirmation");

            if (confirmationInput.type === "password") {
                confirmationInput.type = "text";
                toggleConfirmation.classList.remove("fa-eye-slash");
                toggleConfirmation.classList.add("fa-eye");
            } else {
                confirmationInput.type = "password";
                toggleConfirmation.classList.remove("fa-eye");
                toggleConfirmation.classList.add("fa-eye-slash");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <script src="/beranda/assets/js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
