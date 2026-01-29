<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UPPA | LOGIN</title>

    {{-- LOGO BCA SHORTCUT ICON --}}
    <link href="https://www.bca.co.id/-/media/Feature/Default-BCA/favicon-bca.png" rel="shortcut icon">
    <link href="https://www.bca.co.id/-/media/Feature/Default-BCA/favicon-bca.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom CSS for this page -->
    <style>
        /* Custom background dengan di login page boloo */
        body.bg-image {
            background-image: url('sbadmin2/vendor/bootstrap/asset/background_login.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

</head>

{{-- <body class="bg-gradient-primary"> --}}
<body class="bg-image">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="{{ asset('sbadmin2\vendor\bootstrap\asset\bca_logo.png') }}" alt="Logo BCA"
                                            class="mb-4" style="width: 150px;">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action ="{{ route('loginproses') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                placeholder="Masukkan alamat Email" name="email" value={{ old('email') }}> {{-- simpen email lama di atribut value={{ old('email') }} --}}
                                                @error('email')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                placeholder="Masukkan Password" name="password">
                                                @error('password')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <small class="form-text text-muted text-center mb-3">
                                        Kembali ke Beranda? <a href="{{ route('welcome') }}">Klik disini</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER-->
    <footer>
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sindhu_Atmaja 2025</span>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    @session('success')
        <script>
            Swal.fire({
            title: "Sukses!",
            text: "{{ session('success') }}",
            icon: "success"
            });
        </script>
    @endsession

    @session('error')
        <script>
            Swal.fire({
            title: "Gagal!",
            text: "{{ session('error') }}",
            icon: "error"
            });
        </script>
    @endsession


</body>

</html>