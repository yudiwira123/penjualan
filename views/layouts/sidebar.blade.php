<div class="sidebar">
    <ul class="nav-links">
        <li class="{{ Route::is('Dashboard') ? 'aktif' : ''}}">
            <a href="/">
                <i class='bx bxs-dashboard'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/">Dashboard</a></li>
            </ul>
        </li>
        @can('main')
            <li class="{{ Route::is('IndexMaster', 'AddMaster', 'ShowMaster', 'EditMaster') ? 'aktif' : '' }}">
                <a href="/inventaris/master">
                    <i class='bx bxs-data'></i>
                    <span class="link_name">Master Inventaris</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/inventaris/master">Master Inventaris</a></li>
                </ul>
            </li>
        @endcan
        <li class="{{ Route::is('IndexKIBA', 'IndexKIBB', 'IndexKIBC', 'IndexKIBD', 'IndexKIBE', 'IndexKIBF')  ? 'aktif showMenu' : '' }}">
            <div class="iocn-link">
                <a class="drp" href="#">
                    <i class='bx bx-category'></i>
                    <span class="link_name">Kategori Aset</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Kategori Aset</a></li>
                <li class="{{ Route::is('IndexKIBA') ? 'aktif' : '' }}"><a href="/inventaris/kib_a">KIB A</a></li>
                <li class="{{ Route::is('IndexKIBB') ? 'aktif' : '' }}"><a href="/inventaris/kib_b">KIB B</a></li>
                <li class="{{ Route::is('IndexKIBC') ? 'aktif' : '' }}"><a href="/inventaris/kib_c">KIB C</a></li>
                <li class="{{ Route::is('IndexKIBD') ? 'aktif' : '' }}"><a href="/inventaris/kib_d">KIB D</a></li>
                <li class="{{ Route::is('IndexKIBE') ? 'aktif' : '' }}"><a href="/inventaris/kib_e">KIB E</a></li>
                <li class="{{ Route::is('IndexKIBF') ? 'aktif' : '' }}"><a href="/inventaris/kib_f">KIB F</a></li>
            </ul>
        </li>
        @can('main')
            <li class="{{ Route::is('KIRPerRuang', 'KIRSemuaRuang') || Route::is('AddKIR') ? 'aktif showMenu' : '' }}">
                <div class="iocn-link">
                    <a href="#" class="drp">
                        <i class='bx bx-building-house'></i>
                        <span class="link_name">KIR</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">KIR</a></li>
                    <li class="{{ Route::is('KIRSemuaRuang') ? 'aktif' : '' }}"><a href="/inventaris/ruang">Semua Ruangan</a></li>
                    @foreach ($rng as $r)
                        <li class="{{ Request::is('inventaris/ruang/' . $r->id) ? 'aktif' : '' }}"><a href="/inventaris/ruang/{{ $r->id }}">{{ $r->nm_ruang }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="{{ Route::is('IndexKondisi') ? 'aktif' : '' }}">
                <a href="/inventaris/kondisi">
                    <i><i class="fa-solid fa-list-check"></i></i>
                    <span class="link_name">Kondisi Barang</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="/inventaris/kondisi">Kondisi Barang</a></li>
                </ul>
            </li>
        @endcan
        <li class="{{ Route::is('ExportKIR', 'CetakLabel') ? 'aktif showMenu' : '' }}">
            <div class="iocn-link">
                <a href="#" class="drp">
                    <i class='bx bxs-report'></i>
                    <span class="link_name">Laporan</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Laporan</a></li>
                <li class="{{ Route::is('ExportKIR') ? 'aktif' : '' }} }}"><a href="/laporan/kir">Export KIR</a></li>
                <li class="{{ Route::is('CetakLabel') ? 'aktif' : '' }} }}"><a href="/laporan/label">Cetak Label Inventaris</a></li>
            </ul>
        </li>
        <li class="{{ Route::is('History') ? 'aktif' : '' }}">
            <a href="/history">
                <i class='bx bx-history'></i>
                <span class="link_name">Riwayat</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/history">Riwayat</a></li>
            </ul>
        </li>
        @can('setting')
            <li class="{{ Route::is('user.index', 'user.create', 'user.edit', 'user.show') || Route::is('pengelola.index', 'pengelola.create', 'pengelola.edit', 'pengelola.show') || Route::is('ruangan.index', 'ruangan.create', 'ruangan.edit', 'ruangan.show') || Route::is('kategori.index', 'kategori.create', 'kategori.edit', 'kategori.show') ? 'aktif showMenu' : '' }}">
                <div class="iocn-link">
                    <a class="drp" href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link_name">Pengaturan</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Pengaturan</a></li>
                    <li class="{{ Route::is('user.index', 'user.create', 'user.edit', 'user.show') ? 'aktif' : '' }}"><a href="/setting/user">User</a></li>
                    <li class="{{ Route::is('kategori.index', 'kategori.create', 'kategori.edit', 'kategori.show') ? 'aktif' : '' }}"><a href="/setting/kategori">Jenis Barang</a></li>
                    <li class="{{ Route::is('ruangan.index', 'ruangan.create', 'ruangan.edit', 'ruangan.show') ? 'aktif' : '' }}"><a href="/setting/ruangan">Ruangan</a></li>
                    <li class="{{ Route::is('pengelola.index', 'pengelola.create', 'pengelola.edit', 'pengelola.show') ? 'aktif' : '' }}"><a href="/setting/pengelola">Pengelola</a></li>
                </ul>
            </li>
        @endcan
    </ul>
</div>
