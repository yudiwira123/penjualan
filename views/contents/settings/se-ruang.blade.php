@extends('master')

@section('title', $title)

@section('content')
    <h4>{{ $title }}</h4>
    <hr />
    <div class="d-flex justify-content-between mb-3">
        <div class="me-2">
            <a href="/setting/ruangan" class="btn btn-secondary">
                <span><i class="fas fa-arrow-left"></i></span> Kembali
            </a>
        </div>
        @if ($url == 'setting/ruangan/' . $data->id)
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
    <form action="/setting/ruangan/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card {{ $url == 'setting/ruangan/' . $data->id ? 'border-primary' : 'border-warning' }}">
            <div class="card-body bg-transparent">
                <div class="mb-4">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" value="{{ $data->id }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="nm_ruang" class="form-label">Nama Ruangan</label>
                    <input type="text" class="form-control @error('nm_ruang') is-invalid @enderror" name="nm_ruang"
                        value="{{ old('nm_ruang', $data->nm_ruang) }}" required {{ $url == 'setting/ruangan/' . $data->id ? 'disabled' : '' }}>
                    @error('nm_ruang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi"
                        value="{{ old('lokasi', $data->lokasi) }}" required {{ $url == 'setting/ruangan/' . $data->id ? 'disabled' : '' }}>
                    @error('lokasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="id_pengelola" class="form-label">Pengelola</label>
                    <select class="form-select" name="id_pengelola" required {{ $url == 'setting/ruangan/' . $data->id ? 'disabled' : '' }}>
                        <option>-- Pilih Pengelola --</option>
                        @foreach ($pengelola as $p)
                            <option value="{{ $p->id }}" {{ old('id_pengelola', $data->id_pengelola) == $p->id ? 'selected' : '' }}> {{ $p->nm_pengelola }}</option>
                        @endforeach
                    </select>
                    @error('id_pengelola')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            @if ($url == 'setting/ruangan/' . $data->id . '/edit')
                <div class="card-footer bg-transparent border-warning">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary me-2"><i class="fas fa-save"></i>Save</button>
                        <a href="/setting/ruangan/{{ $data->id }}" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Cancel</a>
                    </div>
                </div>
            @endif
        </div>
    </form>
@endsection
