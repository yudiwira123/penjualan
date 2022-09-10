@extends('master')

@section('title', $title)

@section('content')
    <div class="d-flex">
        <h4>{{ $title }}</h4>
    </div>
    <hr />
    <div class="mt-5">
        <form action="/laporan/kir/export" method="get" class="row g-3">
            <div class="row mb-3">
                <div class="col col-1">
                    <label class="col-sm-2 col-form-label">KIR</label>
                </div>
                <div class="col">
                    <select name="ruangan" class="form-select" required>
                        <option value="">-- Silahkan Pilih Ruangan --</option>
                        @foreach ($data as $d)
                            <option value="{{ $d->id }}">{{ $d->nm_ruang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-download"></i> Download</button>
                </div>
            </div>
        </form>
    </div>
@endsection