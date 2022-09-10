@extends('master')

@section('title', $title)

@section('content')
    <h4>{{ $title }}</h4>
    <hr />
    <div class="d-flex justify-content-between mb-3">
        <div class="me-2">
            <button onclick="window.history.go(-1); return false;" class="btn btn-secondary">
                <span><i class="fas fa-arrow-left"></i></span> Kembali
            </button>
        </div>
    </div>
    <div class="card border-info col-xxl-6 m-auto">
        <form action="/inventaris/store-ruang" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label>Ruangan</label>
                    <select name="ruangan" class="form-select">
                        @foreach ($ruangan as $r)
                            <option value="{{ $r->id }}">{{ $r->nm_ruang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Inventaris yang tidak masuk ruangan</label>
                    <select class="select-inventaris" name="inventaris[]" multiple="multiple">
                        @foreach ($inventaris as $i)
                            @php
                                $arr = [$i->kategori->kd_akun, $i->kategori->kd_kelompok, $i->kategori->kd_jenis, $i->kategori->kd_objek, $i->kategori->kd_ro, $i->kategori->kd_sro, $i->kategori->kd_ssro];
                            @endphp
                            <option value="{{ $i->id }}">
                                {{ implode('.', $arr) . ' - ' . $i->kategori->nm_kategori . ' - ' . date_format(date_create($i->th_beli), "Y") . ' - ' . $i->register }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary me-3"><i class="fas fa-save"></i> Save</button>
                    <a href="/inventaris/ruang" class="btn btn-outline-secondary"><i class="fas fa-ban"></i> Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
