@extends('master')

@section('title', $title)

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('failed'))
        <div class="alert alert-danger" role="alert">
            {{ session('failed') }}
        </div>
    @endif
    <div class="d-flex justify-content-between">
        <h4>{{ $title }}</h4>
        <span></span>
    </div>
    <hr />
    <div class="card col-xxl-7 col-lg-8 m-auto">
        <div class="card-header bg-transparent">
            <form action="/{{ $url }}" method="get">
                <div class="row gx-3">
                    <div class="col col-3">
                        <div class="d-flex align-items-center">
                            <label class="me-2">Pelaku</label>
                            <select name="pelaku" class="form-select form-select-sm">
                                <option value="">Semua</option>
                                @foreach ($pelaku as $p)
                                    <option value="{{ $p->id }}" {{ $p->id == Request::get('pelaku') ? 'selected' : '' }}>{{ $p->nm_user }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col col-7">
                        <div class="d-flex align-items-center">
                            <label class="me-2">Tanggal</label>
                            <div class="div">
                                <input type="date" name="start_date" value="{{ Request::get('start_date') ?? false }}" class="form-control form-control-sm @error('start_date') is-invalid @enderror">
                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label class="mx-2">Sampai</label>
                            <input type="date" name="end_date" value="{{ Request::get('end_date') ?? date("Y-m-d", strtotime("+1 day")) }}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-filter"></i> Filters</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body overflow-auto" style="max-height: 75vh">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Kegiatan</th>
                        <th>Pelaku</th>
                        @can('setting')
                            <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $l)
                        <tr>
                            <td>{{ $l->created_at }}</td>
                            <td>{{ $l->nm_log }}</td>
                            <td>{{ $l->user->nm_user }}</td>
                            @can('setting')
                            <td>
                                <form action="/history/{{ $l->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge bg-danger text-white aksi border-0"
                                        onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
