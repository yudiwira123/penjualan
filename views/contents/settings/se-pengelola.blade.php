@extends('master')

@section('title', $title)

@section('content')
    <h4>{{ $title }}</h4>
    <hr />
    <div class="d-flex justify-content-between mb-3">
        <div class="me-2">
            <a href="/setting/pengelola" class="btn btn-secondary">
                <span><i class="fas fa-arrow-left"></i></span> Kembali
            </a>
        </div>
        @if ($url == 'setting/pengelola/' . $data->id)
            <div class="d-flex">
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
            </div>
        @endif
    </div>
    <form action="/setting/pengelola/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card {{ $url == 'setting/pengelola/' . $data->id ? 'border-primary' : 'border-warning' }}">
            <div class="card-body bg-transparent ">
                <div class="mb-4">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" value="{{ $data->id }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="nm_pengelola" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nm_pengelola') is-invalid @enderror" name="nm_pengelola" value="{{ old('nm_pengelola', $data->nm_pengelola) }}" {{ $url == 'setting/pengelola/' . $data->id ? 'disabled' : '' }}>
                    @error('nm_pengelola')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control nip-pengelola @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip', $data->nip) }}" {{ $url == 'setting/pengelola/' . $data->id ? 'disabled' : '' }}>
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
                    <select name="jabatan" class="form-select" {{ $url == 'setting/pengelola/' . $data->id ? 'disabled' : '' }}>
                        <option>-- Pilih Jabatan --</option>
                        <option value="Tenaga Administrasi"{{ old('jabatan', $data->jabatan) == 'Tenaga Administrasi' ? 'selected' : '' }}>Tenaga Administrasi </option>
                        <option value="Guru" {{ old('jabatan', $data->jabatan) == 'Guru' ? 'selected' : '' }}>Guru</option>
                        <option value="Pengurus Barang" {{ old('jabatan', $data->jabatan) == 'Pengurus Barang' ? 'selected' : '' }}>Pengurus Barang</option>
                        <option value="Kepala Sekolah" {{ old('jabatan', $data->jabatan) == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                    </select>
                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" class="form-control nohp @error('nohp') is-invalid @enderror" name="nohp" value="{{ old('nohp', $data->nohp) }}" {{ $url == 'setting/pengelola/' . $data->id ? 'disabled' : '' }}>
                    @error('nohp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $data->alamat) }}" {{ $url == 'setting/pengelola/' . $data->id ? 'disabled' : '' }}>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            @if ($url == 'setting/pengelola/' . $data->id . '/edit')
                <div class="card-footer bg-transparent border-warning">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary me-2"><i class="fas fa-save"></i>Save</button>
                        <a href="/setting/pengelola/{{ $data->id }}" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Cancel</a>
                    </div>
                </div>
            @endif
        </div>
    </form>
@endsection
