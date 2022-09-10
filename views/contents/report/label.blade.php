@extends('master')

@section('title', $title)

@section('content')
    <div class="d-flex">
        <h4>{{ $title }}</h4>
    </div>
    <hr />
    <div class="mt-5">
        <form action="/laporan/label/export" target="_blank" method="get" class="row g-3">
            <div class="row mb-3">
                <div class="col col-1">
                    <label class="col-sm-2 col-form-label">Ruangan</label>
                </div>
                <div class="col">
                    <select name="ruangan" id="ruangan" class="form-select" onchange="viewLabel()" required>
                        <option value="">-- Silahkan Pilih Ruangan --</option>
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nm_ruang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-print"></i> Cetak</button>
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card col-6">
            <iframe id="view-label" src="" frameborder="0" style="height: 600px"></iframe>
        </div>
    </div>
@endsection