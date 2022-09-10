<table>
    <thead>
        <tr>
            <td colspan="14">Kartu Inventaris Ruangan : {{ $ruang->nm_ruang }}</td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Jenis Barang / Nama Barang</th>
            <th rowspan="2">Merk / Type</th>
            <th rowspan="2">No. Pabrik</th>
            <th rowspan="2">Ukuran</th>
            <th rowspan="2">Bahan</th>
            <th rowspan="2">Tahun Pembelian</th>
            <th rowspan="2">Kode Barang</th>
            <th rowspan="2">No Register</th>
            <th rowspan="2">Harga</th>
            <th colspan="3">Kondisi</th>
            <th rowspan="2">Keterangan</th>
        </tr>
        <tr>
            <th>Baik</th>
            <th>Kurang Baik</th>
            <th>Rusak Berat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $inventaris)
            @php
                if ($inventaris->first()->judul === null || $inventaris->first()->judul === '') {
                    $judul = '';
                    $spesifikasi = '';
                } else {
                    $judul = '(' . $inventaris->first()->judul . ')';
                    $spesifikasi = $inventaris->first()->spesifikasi;
                }
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $inventaris->first()->kategori->nm_kategori}} {{ $judul }}</td>
                <td>{{ $inventaris->first()->type }} {{ $spesifikasi }}</td>
                <td>{{ $inventaris->first()->no_ss }}</td>
                <td>{{ $inventaris->first()->ukuran }}</td>
                <td>{{ $inventaris->first()->bahan }}</td>
                <td>{{ date_format(date_create($inventaris->first()->th_beli), 'Y') }}</td>
                <td>{{ implode('.', [$inventaris->first()->kategori->kd_akun,$inventaris->first()->kategori->kd_kelompok,$inventaris->first()->kategori->kd_jenis,$inventaris->first()->kategori->kd_objek,$inventaris->first()->kategori->kd_ro,$inventaris->first()->kategori->kd_sro,$inventaris->first()->kategori->kd_ssro]) }}
                </td>
                <td>
                    @php
                        foreach($inventaris as $item){
                            $register[] = sprintf('%06d', $item->register);
                        }
                        echo implode(', ', $register);
                        $register = [];
                    @endphp
                    {{-- @if (count($inventaris) > 1)
                        {{ sprintf('%06d', $inventaris->first()->register) . ' s/d ' . sprintf('%06d', $inventaris->last()->register) }}
                    @else
                        {{ sprintf('%06d', $inventaris->first()->register) }}
                    @endif --}}
                </td>
                <td>{{ $inventaris->sum('harga') }}</td>
                <td>{{ count($inventaris->where('kondisi', 'Baik')) }}</td>
                <td>{{ count($inventaris->where('kondisi', 'Kurang Baik')) }}</td>
                <td>{{ count($inventaris->where('kondisi', 'Rusak Berat')) }}</td>
                <td>{{ $inventaris->first()->keterangan }}</td>
            </tr>
        @endforeach
    </tbody>
    <tr></tr>
    <tr>
        <td></td>
        <td>Mengetahui</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Blahkiuh, {{ date('d F Y') }}</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>Kepala SD No. 3 Blahkiuh</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Pengurus Barang</td>
        <td></td>
        <td></td>
        <td></td>
        <td>Penanggung Jawab Ruangan</td>
        <td></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td>{{ $kepsek->nm_pengelola }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{ $pengurus->nm_pengelola }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td>{{ $ruang->pengelola->nm_pengelola }}</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>NIP. {{ $kepsek->nip }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>NIP. {{ $pengurus->nip }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td>NIP. {{ $ruang->pengelola->nip }}</td>
        <td></td>
    </tr>
</table>