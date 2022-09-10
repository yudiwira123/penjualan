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
        <a href="/{{ $url }}/create" class="btn btn-outline-primary"><i class="fas fa-plus"></i>
            {{ $url == 'setting/user' ? 'Tambah User' : ''}}
            {{ $url == 'setting/kategori' ? 'Tambah Jenis Barang' : ''}}
            {{ $url == 'setting/ruangan' ? 'Tambah Ruangan' : ''}}
            {{ $url == 'setting/pengelola' ? 'Tambah Pengelola' : ''}}
        </a>
    </div>
    <hr />
    <table class="table table-hover table-striped">
        @if ($url == 'setting/user')
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $data->firstItem() + $loop->index }}</td>
                        <td>{{ $d->nm_user }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->role }}</td>
                        <td>
                            <a href="/{{ $url . '/' . $d->id }}" class="badge bg-info text-dark aksi"><i
                                    class="fas fa-eye"></i></a>
                            |
                            <a href="/{{ $url . '/' . $d->id }}/edit" class="badge bg-warning text-dark aksi"><i
                                    class="far fa-edit"></i></a>
                            |
                            <form action="/{{$url}}/{{$d->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger text-white aksi border-0" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endif
        @if ($url == 'setting/kategori')
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $data->firstItem() + $loop->index }}</td>
                        <td>
                            @php
                                $arr = [$d->kd_akun, $d->kd_kelompok, $d->kd_jenis, $d->kd_objek, $d->kd_ro, $d->kd_sro, $d->kd_ssro];
                                $id = implode('.', $arr);
                                echo $id;
                            @endphp
                        </td>
                        <td>{{ $d->nm_kategori }}</td>
                        <td>
                            <a href="/{{ $url . '/' . $d->id }}" class="badge bg-info text-dark aksi"><i
                                    class="fas fa-eye"></i></a>
                            |
                            <a href="/{{ $url . '/' . $d->id }}/edit" class="badge bg-warning text-dark aksi"><i
                                    class="far fa-edit"></i></a>
                            |
                            <form action="/{{$url}}/{{$d->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger text-white aksi border-0" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endif
        @if ($url == 'setting/ruangan')
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Ruangan</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Pengelola</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $data->firstItem() + $loop->index }}</td>
                        <td>{{ $d->nm_ruang }}</td>
                        <td>{{ $d->lokasi }}</td>
                        <td>{{ $d->pengelola->nm_pengelola }}</td>
                        <td>
                            <a href="/{{ $url . '/' . $d->id }}" class="badge bg-info text-dark aksi"><i
                                    class="fas fa-eye"></i></a>
                            |
                            <a href="/{{ $url . '/' . $d->id }}/edit" class="badge bg-warning text-dark aksi"><i
                                    class="far fa-edit"></i></a>
                            |
                            <form action="/{{$url}}/{{$d->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger text-white aksi border-0" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endif
        @if ($url == 'setting/pengelola')
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pengelola</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $data->firstItem() + $loop->index }}</td>
                        <td>{{ $d->nm_pengelola }}</td>
                        <td>{{ $d->nip }}</td>
                        <td>{{ $d->jabatan }}</td>
                        <td>{{ $d->nohp }}</td>
                        <td>{{ $d->alamat }}</td>
                        <td>
                            <a href="/{{ $url . '/' . $d->id }}" class="badge bg-info text-dark aksi"><i
                                    class="fas fa-eye"></i></a>
                            |
                            <a href="/{{ $url . '/' . $d->id }}/edit" class="badge bg-warning text-dark aksi"><i
                                    class="far fa-edit"></i></a>
                            |
                            <form action="/{{$url}}/{{$d->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger text-white aksi border-0" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>
    <div class="d-flex justify-content-end">
        {{ $data->links() }}
    </div>
@endsection
