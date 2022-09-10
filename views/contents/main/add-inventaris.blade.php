@extends('master')

@section('title', $title)

@section('content')
<h4>{{ $title }}</h4>
<hr />
<div class="d-flex justify-content-between mb-3">
    <div class="me-2">
        <a href="/inventaris/master" class="btn btn-secondary">
            <span><i class="fas fa-arrow-left"></i></span> Kembali
        </a>
    </div>
</div>
<div class="card border-success col-xxl-6 m-auto">
    <form action="/{{ $url }}/add" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body bg-transparent ">
            <div class="row mb-3">
                <div class="col col-lg-1 col-xxl-2">
                    <label>Banyak</label>
                    <input type="number" class="form-control form-control-sm @error('x') is-invalid @enderror" name="x" value="{{ old('x', 1) }}" required>
                    @error('x')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Jenis Barang</label>
                    <select name="id_kategori" class="form-select form-select-sm jenis-barang" id="jenis-barang" onchange="selectJenisBarang()" required>
                        <option value=""></option>
                        @foreach ($ktgr as $k)
                        <option value="{{ $k->id }}" {{ old('id_kategori') == $k->id ? 'selected' : '' }}>
                            {{ $k->nm_kategori }}
                        </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Kode Barang</label>
                    <input type="text" class="form-control form-control-sm" id="kode" name="kode" value="{{ old('kode') }}" required readonly>
                </div>
                <div class="col">
                    <label>Nomor Register</label>
                    <input type="text" class="form-control form-control-sm @error('register') is-invalid @enderror" id="register" name="register" value="{{ old('register') }}" required readonly>
                    @error('register')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Nomor (Mesin/Chasis/Sertifikat/Pabrik)</label>
                    <input type="text" class="form-control form-control-sm @error('no_ss') is-invalid @enderror" name="no_ss" value="{{ old('no_ss') }}">
                    @error('no_ss')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Merk / Type</label>
                    <input type="text" class="form-control form-control-sm @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}">
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label>Ukuran</label>
                    <input type="text" class="form-control form-control-sm @error('ukuran') is-invalid @enderror" name="ukuran" value="{{ old('ukuran') }}">
                    @error('ukuran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label>Bahan</label>
                    <input type="text" class="form-control form-control-sm @error('bahan') is-invalid @enderror" name="bahan" value="{{ old('bahan') }}">
                    @error('bahan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Judul</label>
                    <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror" name="judul" placeholder="Judul Buku" value="{{ old('judul') }}">
                    <div class="form-text">Isikan apabila inventaris berupa buku.</div>
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label>Spesifikasi</label>
                    <input type="text" class="form-control form-control-sm @error('spesifikasi') is-invalid @enderror" name="spesifikasi" placeholder="Spesifikasi tentang buku" value="{{ old('spesifikasi') }}">
                    <div class="form-text">Isikan apabila inventaris berupa buku.</div>
                    @error('spesifikasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Kondisi / Keadaan</label>
                    <select name="kondisi" class="form-select form-select-sm @error('kondisi') is-invalid @enderror">
                        <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Kurang Baik" {{ old('kondisi') == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                        <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                    </select>
                </div>
                <div class="col">
                    <label>Tanggal Masuk</label>
                    <input type="date" class="form-control form-control-sm th-beli @error('th_beli') is-invalid @enderror" name="th_beli" value="{{ old('th_beli') }}" required>
                    @error('th_beli')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label>Asal (Sumber Barang)</label>
                    <select name="asal" class="form-select form-select-sm @error('asal') is-invalid @enderror" required>
                        <option value="Pembelian" {{ old('asal') == 'Pembelian' ? 'selected' : '' }}>Pembelian </option>
                        <option value="Hibah" {{ old('asal') == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                    </select>
                    @error('asal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Harga</label>
                    <input type="text" class="form-control form-control-sm harga-aset @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" required>
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" rows="2">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="foto" class="form-label">Foto</label>
                    <img class="img-preview img-fluid mb-3 col-8">
                    <input class="form-control form-control-sm @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewImage()">
                    <div class="form-text">Ukuran Gambar minimal 2.5 MB atau 2560 KB</div>
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-success">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-primary btn-save me-2"><i class="fas fa-save"></i>Save</button>
                <button onclick="window.history.go(-1); return false;" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection