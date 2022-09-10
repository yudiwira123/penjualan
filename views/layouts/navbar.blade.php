<nav class="navbar fixed-top navbar-expand-lg mynav">
    <div class="container-fluid">
        <div class="d-flex align-items-center" style="width: 260px">
            <img class="img_logo" src="{{ asset('img/logo_sekolah.png') }}">
            <span class="logo_name m-0">Sistem <br/> Pengelolaan Aset</span>
        </div>
        <button class="btn btn-primary me-3 btn-menu" type="button" title="open-close sidebar"><i class="fas fa-bars"></i></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <form action="/{{ $url }}" method="get">
                @if (Route::is('IndexKIBA', 'IndexKIBB', 'IndexKIBC', 'IndexKIBD', 'IndexKIBE', 'IndexKIBF', 'IndexMaster', 'KIRSemuaRuang', 'KIRPerRuang', 'IndexKondisi', 'user.index', 'pengelola.index', 'ruangan.index', 'kategori.index'))
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Cari...">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                @endif
            </form>
            <ul class="navbar-nav">
                <li class="nav-item dropdown" style="max-width: 200px">
                    <a class="nav-link dropdown-toggle text-truncate text-dark" href="#" id="navbarDarkDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/logo_user.png') }}" class="rounded-circle user-pp me-2">
                        <span>{{ auth()->user()->nm_user }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="/change-password"><i class="fas fa-key me-2"></i>Ganti Password</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
