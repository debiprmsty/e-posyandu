<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Posyandu Care</title>
    <link rel="icon" href="{{ asset('assets/img/logo-fix.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['../assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>

<body>
    <section class="vh-100" style="background-color: #245953;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-6 d-none d-md-block">
                                <img src="{{ asset('assets/img/register.jpg') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem; height:90%" />
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{ route('register.proses') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="{{ asset('assets/img/logo-fix.png') }}" alt=""
                                                srcset="" style="height: 35px; width:35px; border-radius: 50%">
                                            <span class="h3 fw-bold ml-2 mb-0"> Posyandu Care</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Silahkan Daftar
                                            Akun
                                            Terlebih dahulu</h5>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example17"
                                                class="form-control form-control-lg" name="name" required />
                                            <label class="form-label" for="form2Example17">Username</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg" name="email" required />
                                            <label class="form-label" for="form2Example17">Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" name="password" required />
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <span toggle="#form2Example27" class="toggle-password fas fa-eye"></span>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button style="background-color: #408E91"
                                                class="btn btn-lg btn-block text-white" type="submit">Daftar</button>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mt-3">
                                            Sudah memilki akun ?
                                            <a style="color: #245953;" href="{{ route('login') }}"
                                                class=" fw-bold">Login</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Motif cantik1 -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('.toggle-password');
            const passwordInput = document.querySelector('#form2Example27');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>

    @if ($message = Session::get('failed'))
        <script>
            swal({
                title: "Gagal",
                text: '{{ $message }}',
                icon: "error",
                buttons: {
                    confirm: {
                        text: "OKE",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                }
            });
        </script>
    @elseif ($message = Session::get('success'))
        <script>
            swal({
                title: "Sukses",
                text: '{{ $message }}',
                icon: "success",
                buttons: {
                    confirm: {
                        text: "OKE",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: true
                    }
                }
            });
        </script>
    @endif

</body>

</html>
