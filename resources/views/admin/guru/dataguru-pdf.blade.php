<!DOCTYPE html>
<html>

<head>
    <style>
        #dataguru {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #dataguru td,
        #dataguru th {
            border: 1px solid rgb(0, 0, 0);
            padding: 3px;
        }

        #dataguru tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #dataguru tr:hover {
            background-color: #ddd;
        }

        #dataguru th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #208d65;
            color: white;
        }

    </style>
</head>

<body>

    <div class="row justify-content-center">
        <h5>TABLE DATA GURU <br> <strong>SMP ISLAM NURUL HIDAYAH</strong></h5>
    </div>

    <table id="dataguru">
        <tr>
            <th>#</th>
            <th>
                Foto Guru
            </th>
            <th>Nomor Induk Guru</th>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
            <th>Gelar</th>
            <th>Tahun Mulai Mengajar</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
        @foreach ($guru as $index => $tampil)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <img height="80" src="{{ url("assets/admin/image/foto_guru/{$tampil->foto_guru}") }}">
            </td>
            <td>{{ $tampil->nig }}</td>
            <td>{{ $tampil->nama_guru }}</td>
            <td>{{ $tampil->mapel }}</td>
            <td>{{ $tampil->gelar }}</td>
            <td>{{ $tampil->mengajar_sejak }}</td>
            <td>{{ $tampil->tgl_lahir }}</td>
            <td>{{ $tampil->alamat }}</td>
            <td>{{ $tampil->telepon }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
