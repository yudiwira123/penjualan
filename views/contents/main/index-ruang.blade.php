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
        <a href="/inventaris/add-ruang" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah Inventaris ke KIR</a>
    </div>
    <hr />
    <div style="overflow-x: auto">
        <table class="table table-hover table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">No Register</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Bahan</th>
                    <th scope="col">Asal</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Ruang</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i)
                    @php
                        $arr = [$i->kategori->kd_akun, $i->kategori->kd_kelompok, $i->kategori->kd_jenis, $i->kategori->kd_objek, $i->kategori->kd_ro, $i->kategori->kd_sro, $i->kategori->kd_ssro];
                    @endphp
                    <tr>
                        <td>{{ $data->firstItem() + $loop->index }}</td>
                        <td>{{ implode('.', $arr) }}</td>
                        <td>
                            <div class="text-truncate" style="max-width: 200px">
                                {{ $i->kategori->nm_kategori }}
                            </div>
                        </td>
                        <td>{{ $i->register }}</td>
                        <td>
                            <div class="text-truncate" style="max-width: 100px">
                                {{ $i->type }}
                            </div>
                        </td>
                        <td>
                            <div class="text-truncate" style="max-width: 100px">
                                {{ $i->ukuran }}
                            </div>
                        </td>
                        <td>{{ $i->bahan }}</td>
                        <td>{{ $i->asal }}</td>
                        <td>{{ date_format(date_create($i->th_beli), "Y") }}</td>
                        <td>{{ number_format($i->harga,2,",",".") }}</td>
                        <td>
                            <form action="/inventaris/change-inventaris-kir/{{ $i->id }}" method="post">
                                @csrf
                                <select name="id_ruang" class="form-select form-select-sm" onchange="this.form.submit()">
                                    @foreach ($rng as $ruang)
                                        <option value="{{ $ruang->id }}" {{ $ruang->id == $i->id_ruang ? 'selected' : '' }}>{{ $ruang->nm_ruang }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td>
                            <div class="text-truncate" style="max-width: 300px">
                                {{ $i->keterangan }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
        {{ $data->links() }}
    </div>
@endsection
