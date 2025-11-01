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
    .ttd td { width: 33%; }
    @media print { .no-print { display: none; } }
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
        <td>{{ $parent->created_at->toDateString() }}</td>
        <th>Saldo Awal</th>
        <td>Rp {{ number_format($parent->opening_kas, 0, ',', '.') }}</td>
    </tr>
    <tr>
        <th>Saldo Akhir</th>
        <td>Rp {{ number_format($parent->ending_kas, 0, ',', '.') }}</td>
        <th>Total Debit</th>
        <td>Rp {{ number_format($parent->total_debit, 0, ',', '.') }}</td>
    </tr>
    <tr>
        <th>Total Kredit</th>
        <td>Rp {{ number_format($parent->total_credit, 0, ',', '.') }}</td>
        <th>Periode</th>
        <td>{{ $parent->created_at->format('F Y') }}</td>
    </tr>
</table>

<br>

<table>
    <tr>
        <th>No</th>
        <th>Debit</th>
        <th>Kredit</th>
        <th>Jenis Biaya</th>
        <th>Bukti Foto</th>
        <th>Catatan</th>
    </tr>
    @foreach ($parent->cashChild as $i => $row)
    <tr>
        <td>{{ $i+1 }}</td>
        <td>Rp {{ number_format($row->debit, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($row->credit, 0, ',', '.') }}</td>
        <td>{{ $row->type_payment }}</td>
        <td style="width: 180px;">
            @if($row->proof_payment)
                <img src="{{ asset('storage/' . $row->proof_payment) }}" 
                     alt="Bukti"
                     style="width:180px; height:auto; object-fit:cover;">
            @endif
        </td>
        <td>{{ $row->notes }}</td>
    </tr>
    @endforeach
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

<script>
    window.onload = () => window.print()
</script>

</body>
</html>
