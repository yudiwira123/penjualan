<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- My Style CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- FontAwesome Icons CSS --}}
    <script src="https://kit.fontawesome.com/6787aab0d7.js" crossorigin="anonymous"></script>
</head>

<body style="background: #f5f5f5">
    <div class="container-fluid">
        <div class="login-form row justify-content-center align-content-center">
            <div class="col col-lg-4 col-xxl-3">
                <div class="card m-4 pt-3">
                    <img class="align-self-center" src="{{ asset('img/logo_sekolah.png') }}" width="100px"
                        height="100px">
                    <div class="card-body">
                        <h4 class="card-title text-center">Halaman Login</h4>
                        <h4 class="card-title mb-4 text-center">Sistem Pengelolaan Aset</h4>
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger text-center">
                                {{ session('loginError') }}
                            </div>
                        @endif
                        <form action="/login" method="post" autocomplete="off">
                            @csrf
                            <div class="form-floating mb-1">
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Masukkan Username" required autofocus>
                                <label>Username</label>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-1">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Masukkan Password" required>
                                <label>Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 w-100"><i class="fas fa-sign-in-alt me-1"></i> Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
