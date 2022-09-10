@extends('master')

@section('title', $title)

@section('content')
    <h4>{{ $title }}</h4>
    <hr />
    <div class="d-flex justify-content-between mb-3">
        <div class="me-2">
            @if ($url == 'setting/user/create')
                <a href="/setting/user" class="btn btn-secondary">
                    <span><i class="fas fa-arrow-left"></i></span> Kembali
                </a>
            @endif
            @if ($url == 'setting/kategori/create')
                <a href="/setting/kategori" class="btn btn-secondary">
                    <span><i class="fas fa-arrow-left"></i></span> Kembali
                </a>
            @endif
            @if ($url == 'setting/ruangan/create')
                <a href="/setting/ruangan" class="btn btn-secondary">
                    <span><i class="fas fa-arrow-left"></i></span> Kembali
                </a>
            @endif
            @if ($url == 'setting/pengelola/create')
                <a href="/setting/pengelola" class="btn btn-secondary">
                    <span><i class="fas fa-arrow-left"></i></span> Kembali
                </a>
            @endif
        </div>
    </div>
    <div class="card border-success">
        @if ($url == 'setting/user/create')
            <form action="/setting/user" method="post">
                @csrf
                <div class="card-body bg-transparent ">
                    <div class="mb-4">
                        <label for="nm_user" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nm_user') is-invalid @enderror" name="nm_user" value="{{ old('nm_user') }}" required>
                        @error('nm_user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select @error('role') is-invalid autofocus @enderror" name=" role" required>
                            <option selected>-- Pilih Role --</option>
                            <option value="Admin" {{ old('role') === 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Petugas Aset" {{ old('role') === 'Petugas Aset' ? 'selected' : '' }}>Petugas
                                Aset
                            </option>
                            <option value="Kepala Sekolah" {{ old('role') === 'Kepala Sekolah' ? 'selected' : '' }}>Kepala
                                Sekolah</option>
                            <option value="Staff Aset Dinas" {{ old('role') === 'Staff Aset Dinas' ? 'selected' : '' }}>
                                Staff Aset Dinas</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
        @endif
        @if ($url == 'setting/kategori/create')
            <form action="/setting/kategori" method="post">
                @csrf
                <div class="card-body bg-transparent ">
                    <div class="mb-4">
                        <label for="kode" class="form-label">Kode Jenis Barang</label>
                        <input type="text" class="form-control kode-kategori @error('kode') is-invalid @enderror" name="kode" placeholder="Contoh : 1.1.1.01.001.001.001" value="{{ old('kode') }}" required>
                        @error('kode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Jenis Barang</label>
                        <input type="text" class="form-control @error('nm_kategori') is-invalid @enderror" name="nm_kategori" value="{{ old('nm_kategori') }}" required>
                        @error('nm_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
        @endif
        @if ($url == 'setting/ruangan/create')
            <form action="/setting/ruangan" method="post">
                @csrf
                <div class="card-body bg-transparent ">
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control @error('nm_ruang') is-invalid @enderror" name="nm_ruang" value="{{ old('nm_ruang') }}" required>
                        @error('nm_ruang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" required>
                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="id_pengelola" class="form-label">Pengelola</label>
                        <select class="form-select" name="id_pengelola" required>
                            <option>-- Pilih Pengelola --</option>
                            @foreach ($pengelola as $p)
                                <option value="{{ $p->id }}"
                                    {{ old('id_pengelola') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nm_pengelola }}</option>
                            @endforeach
                        </select>
                        @error('id_pengelola')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
        @endif
        @if ($url == 'setting/pengelola/create')
            <form action="/setting/pengelola" method="post">
                @csrf
                <div class="card-body bg-transparent ">
                    <div class="mb-4">
                        <label for="nm_pengelola" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nm_pengelola') is-invalid @enderror" name="nm_pengelola" value="{{ old('nm_pengelola') }}">
                        @error('nm_pengelola')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control nip-pengelola @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}">
                        <div id="nip" class="form-text">
                            Apabila tidak memiliki NIP masukkan angka "0"
                        </div>
                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select name="jabatan" class="form-select">
                            <option>-- Pilih Jabatan --</option>
                            <option value="Tenaga Administrasi"{{ old('jabatan') == 'Tenaga Administrasi' ? 'selected' : '' }}>Tenaga Administrasi </option>
                            <option value="Guru" {{ old('jabatan') == 'Guru' ? 'selected' : '' }}>Guru</option>
                            <option value="Pengurus Barang" {{ old('jabatan') == 'Pengurus Barang' ? 'selected' : '' }}>Pengurus Barang</option>
                            <option value="Kepala Sekolah" {{ old('jabatan') == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                        </select>
                        @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nohp" class="form-label">No HP</label>
                        <input type="text" class="form-control nohp @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp') }}">
                        @error('nohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
        @endif
        <div class="card-footer bg-transparent border-success">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-primary me-2"><i class="fas fa-save"></i> Save</button>
                <button onclick="window.history.go(-1); return false;" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Cancel</button>
            </div>
        </div>
        </form>
    </div>
@endsection
