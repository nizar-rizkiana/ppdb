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
            width: fit-content;
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
        .lulus{
            text-align:center;
            border: 2px solid black;
            margin-bottom: 4px;
            font-size: 24px;
            font-weight: bold;
            padding: 12px;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div class="judul">
        <span>SURAT PERNYATAAN DI TERIMA</span>
    </div>
    <br>
    <P>Yang bertanda tangan di bawah ini, Kepala SMKN 4 Pandeglang Provinsi Banten :</P>
    <table>
        <tr>
            <td width="30%">No. Pendaftaran</td>
            <td width="5%">:</td>
            <td width="65%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['id_peserta'] ?></span>
            </td>
        </tr>
        <tr>
            <td width="30%">Nama Lengkap</td>
            <td width="5%">:</td>
            <td width="65%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['nama_lengkap'] ?></span>
            </td>
        </tr>
        <tr>
            <td width="30%">Tempat dan Tanggal lahir</td>
            <td width="5%">:</td>
            <td width="65%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['tempat_lahir'] ?>, <?= date('d-m-Y', strtotime($peserta['tanggal_lahir'])) ?></span>
            </td>
        </tr>
        <tr>
            <td width="30%">Asal Sekolah</td>
            <td width="5%">:</td>
            <td width="65%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['asal_sekolah'] ?></span>
            </td>
        </tr>
        <tr>
            <td width="30%">Alamat</td>
            <td width="5%">:</td>
            <td width="65%" height="25px">
                <span style="text-transform:uppercase; padding:0; margin:0;"><?= $peserta['alamat'] ?></span>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <span>Berdasarkan Hasil Rapat Dinas Pendidikan dan Tenaga Kependidikan Penentuan Kelulusan Tanggal 25 Juli 2023, dengan ini calon Peserta Didik Baru tersebut di atas dinyatakan :</span>
    <br>
    <?php if($peserta['status'] == 3) : ?>
    <div class="lulus">
        <span>DITERIMA</span>
    </div>
    <?php endif; ?>
    <?php if($peserta['status'] == 4) : ?>
    <div class="lulus">
        <span>DITOLAK</span>
    </div>
    <?php endif; ?>
    <br>
    <span>Menjadi Siswa SMKN 4 Pandeglang Provinsi Banten Program Keahlian &nbsp;<b><?= $peserta['diterima'] ?></b>&nbsp; Tahun Ajaran 2023/2024</span>
    <br>
    <br>
    <i>Selamat bergabung dan belajar dengan penuh semangat.</i>
    <br>
    <br>
    <table id="ttd">
        <tr>
            <td width="70%">

            </td>
            <td style="width: 30%;">
                <span>Pandeglang</span><br>
                <span>Kepala Sekolah</span>
                <br>
                <br>
                <p></p>
                <span>Dr. Ir. H. Susila</span>
                <hr><br>
                <span>Nip. 196702241997031003</span>
            </td>
        </tr>
    </table>
</body>

</html>