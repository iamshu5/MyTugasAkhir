<!DOCTYPE html>
<html>

<head>
    <style>
        #dataalumni {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #dataalumni td,
        #dataalumni th {
            border: 1px solid #ddd;
            padding: 4px;
        }

        #dataalumni tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #dataalumni tr:hover {
            background-color: #ddd;
        }

        #dataalumni th {
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
        <h5>TABLE DATA ALUMNI <br> <strong>SMP ISLAM NURUL HIDAYAH</strong></h5>
    </div>

    <table id="dataalumni">
        <tr>
            <th>#</th>
            <th>Foto Alumni</th>
            <th>NIS</th>
            <th>Nama Siswa Alumni</th>
            <th>Tahun Lulus</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Telepon</th>
        </tr>
        @foreach ($alumni as $index => $tampil)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <img height="80" src="{{ url("assets/admin/image/foto_alumni/{$tampil->foto_alumni}") }}">
            </td>
            <td>{{ $tampil->nis }}</td>
            <td>{{ $tampil->nama_alumni }}</td>
            <td>{{ $tampil->tahun_lulus }}</td>
            <td>{{ $tampil->alamat }}</td>
            <td>{{ $tampil->email }}</td>
            <td>{{ $tampil->telepon }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
