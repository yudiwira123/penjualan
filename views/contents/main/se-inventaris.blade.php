@extends('master')

@section('title', $title)

@section('content')
<h4>{{ $title }}</h4>
<hr />
<div class="d-flex justify-content-between mb-3">
    <div class="me-2">
        <button onclick="window.history.go(-1); return false;" class="btn btn-outline-secondary"><span><i class="fas fa-arrow-left"></i></span> Kembali</button>
    </div>
    @if ($url == 'inventaris/master/' . $data->id)
    <div class="d-flex">
        @can('main')
        <div class="me-2">
            <a href="/{{ $url }}/edit" class="btn btn-warning text-white">
                <span><i class="far fa-edit"></i></span> Edit
            </a>
        </div>
        <div class="me-2">
            <form action="/{{$url}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><span><i class="far fa-trash-alt"></i></span> Hapus</button>
            </form>
        </div>
        @endcan
    </div>
    @endif
</div>
<div class="card {{ $url == 'inventaris/master/'. $data->id . '/edit' ? 'border-warning' : 'border-primary' }} col-xxl-6 m-auto">
    <form action="/inventaris/master/{{ $data->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="card-body bg-transparent ">
            <div class="row mb-3">
                <input type="hidden" name="oldFoto" value="{{ $data->foto }}">
                <div class="col">
                    <label>Jenis Barang</label>
                    <select name="id_kategori" class="form-select form-select-sm jenis-barang" id="jenis-barang" onchange="selectEditJenisBarang()" required {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
                        <option value=""></option>
                        @foreach ($ktgr as $k)
                        <option value="{{ $k->id }}" {{ old('id_kategori', $data->id_kategori) == $k->id ? 'selected' : '' }}>
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
                    <input type="text" class="form-control form-control-sm" id="kode" name="kode" value="{{ old('kode', $data->kode) }}" required readonly>
                </div>
                <div class="col">
                    <label>Nomor Register</label>
                    <input type="text" class="form-control form-control-sm" id="register" name="register" value="{{ old('register', $data->register) }}" required readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Nomor (Mesin/Chasis/Sertifikat/Pabrik)</label>
                    <input type="text" class="form-control form-control-sm @error('no_ss') is-invalid @enderror" name="no_ss" value="{{ old('no_ss', $data->no_ss) }}" {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
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
                    <input type="text" class="form-control form-control-sm @error('type') is-invalid @enderror" name="type" value="{{ old('type', $data->type) }}" {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label>Ukuran</label>
                    <input type="text" class="form-control form-control-sm @error('ukuran') is-invalid @enderror" name="ukuran" value="{{ old('ukuran', $data->ukuran) }}" {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
                    @error('ukuran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label>Bahan</label>
                    <input type="text" class="form-control form-control-sm @error('bahan') is-invalid @enderror" name="bahan" value="{{ old('bahan', $data->bahan) }}" {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
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
                    <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror" name="judul" placeholder="Judul Buku" value="{{ old('judul', $data->judul) }}" {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
                    @if ($url == 'inventaris/master/' . $data->id)
                    @else
                        <div class="form-text">Isikan apabila inventaris berupa buku.</div>
                    @endif
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label>Spesifikasi</label>
                    <input type="text" class="form-control form-control-sm @error('spesifikasi') is-invalid @enderror" name="spesifikasi" placeholder="Spesifikasi tentang buku" value="{{ old('spesifikasi', $data->spesifikasi) }}" {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
                    @if ($url == 'inventaris/master/' . $data->id)
                    @else
                        <div class="form-text">Isikan apabila inventaris berupa buku.</div>
                    @endif
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
                    <select name="kondisi" class="form-select form-select-sm @error('kondisi') is-invalid @enderror" {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
                        <option value="Baik" {{ old('kondisi', $data->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Kurang Baik" {{ old('kondisi', $data->kondisi) == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                        <option value="Rusak Berat" {{ old('kondisi', $data->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                    </select>
                </div>
                <div class="col">
                    <label>Tanggal Masuk</label>
                    <input type="date" class="form-control form-control-sm th-beli @error('th_beli') is-invalid @enderror" name="th_beli" value="{{ old('th_beli', $data->th_beli) }}" required {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
                    @error('th_beli')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label>Asal (Sumber Barang)</label>
                    <select name="asal" class="form-select form-select-sm @error('asal') is-invalid @enderror" required {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
                        <option value="Pembelian" {{ old('asal', $data->asal) == 'Pembelian' ? 'selected' : '' }}>Pembelian </option>
                        <option value="Hibah" {{ old('asal', $data->asal) == 'Hibah' ? 'selected' : '' }}>Hibah</option>
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
                    <input type="text" class="form-control form-control-sm harga-aset @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $data->harga) }}" required {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>
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
                    <textarea name="keterangan" class="form-control form-control-sm @error('keterangan') is-invalid @enderror" rows="2" {{ $url == 'inventaris/master/' . $data->id ? 'disabled' : '' }}>{{ old('keterangan', $data->keterangan) }}</textarea>
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
                    @if ($data->foto)
                        @if ($url == 'inventaris/master/' . $data->id)
                            <a href="/storage/{{ $data->foto }}" target="_blank">
                                <img src="{{ asset('storage/' . $data->foto) }}" class="img-preview img-fluid mb-3 d-block">
                            </a>
                        @else
                            <img src="{{ asset('storage/' . $data->foto) }}" class="img-preview img-fluid mb-3 d-block">
                        @endif
                    @else
                        <img class="img-preview img-fluid mb-3">
                    @endif
                    <input class="form-control form-control-sm @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewImage()" {{ $url == 'inventaris/master/' . $data->id ? 'hidden' : '' }}>
                    @if ($url == 'inventaris/master/' . $data->id)
                    @else
                        <div class="form-text">Ukuran Gambar minimal 2.5 MB atau 2560 KB</div>
                    @endif
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        @if ($url == 'inventaris/master/' . $data->id. '/edit')    
        <div class="card-footer bg-transparent {{ $url == 'inventaris/master/'. $data->id . '/edit' ? 'border-warning' : 'border-primary' }}">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-primary btn-save me-2"><i class="fas fa-save"></i>Save</button>
                <button onclick="window.history.go(-1); return false;" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Cancel</button>
            </div>
        </div>
        @endif
    </form>
</div>
@endsection