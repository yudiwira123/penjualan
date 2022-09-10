@extends('master')

@section('title', $title)

@section('content')
    <h4>{{ $title }}</h4>
    <hr />
    <div class="d-flex justify-content-between mb-3">
        <div class="me-2">
            <a href="/setting/user" class="btn btn-outline-secondary"><span><i class="fas fa-arrow-left"></i></span> Kembali</a>
        </div>
        @if ($url == 'setting/user/' . $data->id)
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
    <form action="/setting/user/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="card {{ $url == 'setting/user/' . $data->id ? 'border-primary' : 'border-warning' }}">
            <div class="card-body bg-transparent">
                <div class="mb-4">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" value="{{ $data->id }}" readonly>
                </div>
                <div class="mb-4">
                    <label for="nm_user" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nm_user') is-invalid @enderror" name="nm_user" value="{{ old('nm_user', $data->nm_user) }}" required {{ $url == 'setting/user/' . $data->id ? 'disabled' : '' }}>
                    @error('nm_user')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $data->username) }}" required {{ $url == 'setting/user/' . $data->id ? 'disabled' : '' }} readonly>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required {{ $url == 'setting/user/' . $data->id ? 'disabled' : '' }}>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select @error('role') is-invalid autofocus @enderror" name=" role" required {{ $url == 'setting/user/' . $data->id ? 'disabled' : '' }}>
                        <option selected>-- Pilih Role --</option>
                        <option value="Admin" {{ old('role', $data->role) === 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Petugas Aset" {{ old('role', $data->role) === 'Petugas Aset' ? 'selected' : '' }}>Petugas Aset</option>
                        <option value="Kepala Sekolah" {{ old('role', $data->role) === 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                        <option value="Staff Aset Dinas" {{ old('role', $data->role) === 'Staff Aset Dinas' ? 'selected' : '' }}>Staff Aset Dinas</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            @if ($url == 'setting/user/' . $data->id . '/edit')
                <div class="card-footer bg-transparent">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary me-2"><i class="fas fa-save"></i> Save</button>
                        <a href="/setting/user/{{ $data->id }}" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Cancel</a>
                    </div>
                </div>
            @endif
        </div>
    </form>
@endsection
