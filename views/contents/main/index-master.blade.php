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
        <a href="/inventaris/create" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Tambah Inventaris</a>
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
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
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
                            <div class="text-truncate" style="max-width: 200px">
                                {{ $i->keterangan }}
                            </div>
                        </td>
                        <td>
                            <a href="/inventaris/master/{{ $i->id }}" class="badge bg-info text-dark aksi"><i class="fas fa-eye"></i></a>
                            |
                            <a href="/inventaris/master/{{ $i->id }}/edit" class="badge bg-warning text-dark aksi"><i class="far fa-edit"></i></a>
                            |
                            <form action="/inventaris/master/{{ $i->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger text-white aksi border-0" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
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
