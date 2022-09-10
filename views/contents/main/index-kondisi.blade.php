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
        <div class="col-2">
            <form action="" method="get">
                <div class="row">
                    <div class="col-auto">
                        <label class="col-form-label">Filter Kondisi</label>
                    </div>
                    <div class="col-auto">
                        <select name="status" class="form-select" id="select-kondisi" onchange="this.form.submit()">
                            <option value="">Semua</option>
                            <option value="Baik" {{ $kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Kurang Baik" {{ $kondisi == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                            <option value="Rusak Berat" {{ $kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
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
                    <th scope="col">Kondisi Barang</th>
                    <th scope="col">Keterangan</th>
                    {{-- <th scope="col">Aksi</th> --}}
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
                            <form action="/inventaris/change-kondisi/{{ $i->id }}" method="post">
                                @csrf
                                <select name="kondisi" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="Baik" {{ $i->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Kurang Baik" {{ $i->kondisi == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                                    <option value="Rusak Berat" {{ $i->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
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
