@extends('master')

@section('title', $title)

@section('content')
    <h4>{{ $title }}</h4>
    <hr />
    <div class="d-flex justify-content-between mb-3">
        <div class="me-2">
            <a href="/setting/kategori" class="btn btn-secondary">
                <span><i class="fas fa-arrow-left"></i></span> Kembali
            </a>
        </div>
        @if ($url == 'setting/kategori/' . $data->id)
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
    <form action="/setting/kategori/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card {{ $url == 'setting/kategori/' . $data->id ? 'border-primary' : 'border-warning' }}">
            <div class="card-body bg-transparent">
                <div class="mb-4">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" value="{{ $data->id }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="kode" class="form-label">Kode Barang</label>
                    @php
                        $arr = [$data->kd_akun, $data->kd_kelompok, $data->kd_jenis, $data->kd_objek, $data->kd_ro, $data->kd_sro, $data->kd_ssro];
                    @endphp
                    <input type="text" class="form-control kode-kategori @error('kode') is-invalid @enderror" name="kode" placeholder="Contoh : 1.1.1.01.001.001.001" value="{{ old('kode', implode('.', $arr)) }}" required {{ $url == 'setting/kategori/' . $data->id ? 'disabled' : '' }}>
                    @error('kode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nama" class="form-label">Jenis Barang</label>
                    <input type="text" class="form-control @error('nm_kategori') is-invalid @enderror" name="nm_kategori" value="{{ old('nm_kategori', $data->nm_kategori) }}" required {{ $url == 'setting/kategori/' . $data->id ? 'disabled' : '' }}>
                    @error('nm_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            @if ($url == 'setting/kategori/' . $data->id . '/edit')
                <div class="card-footer bg-transparent border-warning">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary me-2"><i class="fas fa-save"></i>Save</button>
                        <a href="/setting/kategori/{{ $data->id }}" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Cancel</a>
                    </div>
                </div>
            @endif
        </div>
    </form>
@endsection
