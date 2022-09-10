@extends('master')

@section('title', $title)

@section('content')
    @if (session()->has('passwordChanged'))
        <div class="alert alert-success">
            {{ session('passwordChanged') }}
        </div>
    @endif
    <div class="card border-dark col-xxl-5 m-auto">
        <h5 class="card-header border-dark bg-transparent">Ubah Password</h5>
        <form action="/change-password" method="post">
            @csrf
            <div class="card-body border-dark bg-transparent">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}" placeholder="Username" readonly>
                    <label>Username</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control @error('old-password') is-invalid @enderror" name="old-password" placeholder="Password Lama" required>
                    <label>Password Lama</label>
                    @error('old-password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password" placeholder="Password Baru" required>
                    <label>Password Baru</label>
                    @error('new-password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" placeholder="Konfirmasi Password Baru" required>
                    <label>Konfirmasi Password Baru</label>
                    @error('confirm-password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer border-dark bg-transparent">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary me-3"><i class="fas fa-save"></i> Save</button>
                    <a href="/dashboard" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
