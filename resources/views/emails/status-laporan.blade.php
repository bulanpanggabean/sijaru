<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Laporan SIJARU</title>
</head>
<body style="font-family:Arial, Helvetica, sans-serif;background:#f4f4f4;padding:20px;">

<div style="max-width:700px;margin:auto;background:white;padding:30px;border-radius:8px;">

    <h2 style="color:#0d6efd;">
        SIJARU
    </h2>

    <p>Halo,</p>

    <p>
        Status laporan jalan rusak yang Anda kirim telah diperbarui oleh Admin SIJARU.
    </p>

    <hr>

    <table width="100%" cellpadding="8">

        <tr>
            <td width="180"><b>Judul Laporan</b></td>
            <td>{{ $laporan->judul }}</td>
        </tr>

        <tr>
            <td><b>Lokasi</b></td>
            <td>{{ $laporan->lokasi }}</td>
        </tr>

        <tr>
            <td><b>Status</b></td>
            <td>
                <strong style="color:green;">
                    {{ $laporan->status }}
                </strong>
            </td>
        </tr>

        <tr>
            <td><b>Tanggal</b></td>
            <td>{{ now()->format('d-m-Y H:i') }}</td>
        </tr>

    </table>

    <hr>

    <p>
        Terima kasih telah menggunakan aplikasi <b>SIJARU</b>.
    </p>

</div>

</body>
</html>