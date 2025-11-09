<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Bukti Kas</title>
<style>
    body { font-family: Arial, sans-serif; font-size: 14px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    .title { text-align: center; font-size: 18px; font-weight: bold; margin-top: 10px; }
    .header { text-align: center; line-height: 1.4; }
    .ttd { width: 100%; margin-top: 40px; text-align: center; }
    .ttd div { width: 33%; float: left; }
    @media print {
        .no-print { display: none; }
    }
</style>
</head>
<body>

<div class="header">
    <b>PT. Kama Spa</b><br>
    Alamat : Jl. Teratai No. 1-3, Blok 2 Baloi, Batam-Indonesia<br>
    Telepon : (0778) 457 326
</div>

<hr>

<div class="title">BUKTI KAS</div>

<table>
    <tr>
        <th>Tanggal</th>
        <th>Debit</th>
        <th>Kredit</th>
        <th>Jenis Biaya</th>
        <th>Bukti Foto</th>
        <th>Catatan</th>
    </tr>
    <tr>
        <td>{{ $data->date }}</td>
        <td>Rp. {{ number_format($data->debit, 0, ',', '.') }}</td>
        <td>Rp. {{ number_format($data->credit, 0, ',', '.') }}</td>
        <td>{{ $data->type_payment }}</td>
        <td style="width: 180px;">
            @if($data->proof_payment)
                <img src="{{ asset('storage/' . $data->proof_payment) }}" 
                     alt="Bukti"
                     style="width:180px; height:auto; object-fit:cover;">
            @endif
        </td>
        <td>{{ $data->notes }}</td>
    </tr>
</table>

<br><br>

<table class="ttd">
<tr>
    <td>Dibuat Oleh</td>
    <td>Mengetahui</td>
    <td>Menyetujui</td>
</tr>
<tr>
    <td><br><br><br>(________________)</td>
    <td><br><br><br>(________________)</td>
    <td><br><br><br>(________________)</td>
</tr>
</table>

<br><br>

<i>Tanggal Cetak: {{ now() }}</i><br>
<i>Oleh Admin</i>

<br><br>
<button class="no-print" onclick="window.print()">Print</button>

</body>
</html>
