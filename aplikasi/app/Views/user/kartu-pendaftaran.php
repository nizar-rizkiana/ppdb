<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kertu pendaftaran</title>
    <style>
        .judul {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-top: 16px;
        }

        table {
            width: 100%;
            border: none;
            margin: 20px 0px
        }
        table tr td{
            text-transform: uppercase;
            padding: 12px;
        }
        table tr{
            padding : 12px;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div class="judul">
        <span>KARTU PENDAFTARAN</span><br>
        <span>PENERIMAAN PESERTA DIDIK BARU (PPDB)</span>
    </div>
    <br>
    <br>
    <table>
        <tr>
            <td width="20%">No. Pendaftaran</td>
            <td width="5%">:</td>
            <td width="75%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['id_peserta'] ?></span>
            </td>
        </tr>
        <tr>
            <td width="20%">Nama Lengkap</td>
            <td width="5%">:</td>
            <td width="75%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['nama_lengkap'] ?></span>
            </td>
        </tr>
        <tr>
            <td width="20%">Asal Sekolah</td>
            <td width="5%">:</td>
            <td width="75%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['asal_sekolah'] ?></span>
            </td>
        </tr>
        <tr>
            <td width="20%">Pilihan 1</td>
            <td width="5%">:</td>
            <td width="75%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['pilihan_pertama'] ?></span>
            </td>
        </tr>
        <tr>
            <td width="20%">Pilihan 2</td>
            <td width="5%">:</td>
            <td width="75%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['pilihan_kedua'] ?></span>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <b>Berkas WAjib</b><br>
    <span>1.Rapor 2.kTP ayah 3.KTP ibu 4.KK 5.Photo 6.Akte 7.SKL 8.Domisili(Siswa Luar Provinsi banten)</span>
    <br>
    <table id="ttd">
        <tr>
            <td width="70%">

            </td>
            <td style="width: 30%; text-align: center">
                <p>Pandeglang, <?= date('d/m/Y', strtotime($peserta['created_at'])) ?></p>
                <p>Panitia PPDB</p>
                <br>
                <br>
                <p>(................................)</p>
            </td>
        </tr>
    </table>
</body>

</html>