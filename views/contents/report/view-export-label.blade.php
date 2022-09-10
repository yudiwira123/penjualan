<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            grid-gap: 10px;
            padding: 10px;
        }

        button {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }

    </style>
</head>

<body>
    <div class="grid-container">
        @foreach ($data as $i)
            <table>
                <tbody>
                    @php
                        $kode = implode('.', [$i->kategori->kd_akun, $i->kategori->kd_kelompok, $i->kategori->kd_jenis, $i->kategori->kd_objek, $i->kategori->kd_ro, $i->kategori->kd_sro, $i->kategori->kd_ssro]);
                    @endphp
                    <tr>
                        <td rowspan="4" style="width: 50px;">
                            <img src="{{ asset('img/logo_badung.png') }}" style="height: 80px" width="auto">
                        </td>
                        <td>{{ $kode }}</td>
                        <td rowspan="4" style="width: 50px">
                            {{ QrCode::size('70')->generate($kode . ' - ' . $i->kategori->nm_kategori . ' - ' . date_format(date_create($i->th_beli), "Y") . ' - ' . $i->register) }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $i->kategori->nm_kategori }}</td>
                    </tr>
                    <tr>
                        <td>{{ sprintf('%06d', $i->register) }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center"><strong>SD No. 3 Blahkiuh</strong></td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
</body>

</html>
