<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Kas — Kama Spa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Jost', sans-serif; font-size: 13px; color: #1a1510; background: #fff; padding: 2.5rem; max-width: 1000px; margin: 0 auto; }
        .print-header { text-align: center; padding-bottom: 1.2rem; border-bottom: 2px solid #c4a484; margin-bottom: 1.5rem; }
        .print-header .brand { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; font-weight: 500; letter-spacing: 0.18em; text-transform: uppercase; color: #3d2e1a; }
        .print-header .brand-sub { font-size: 0.72rem; letter-spacing: 0.25em; text-transform: uppercase; color: #c4a484; margin-top: 0.2rem; }
        .print-header .brand-info { font-size: 0.8rem; color: #6b5540; margin-top: 0.5rem; line-height: 1.6; }
        .doc-title { text-align: center; font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; font-weight: 500; letter-spacing: 0.25em; text-transform: uppercase; color: #3d2e1a; margin: 1.5rem 0 1.2rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 0.75rem; font-size: 0.82rem; }
        th, td { border: 1px solid #c4a484; padding: 7px 10px; text-align: left; color: #1a1510; }
        th { background: #f5ece0; font-weight: 500; letter-spacing: 0.06em; font-size: 0.78rem; color: #5a3e28; }
        tr:nth-child(even) td { background: #fdf9f5; }
        .ttd { width: 100%; margin-top: 3rem; text-align: center; }
        .ttd td { border: none; width: 33.33%; vertical-align: top; font-size: 0.8rem; color: #5a3e28; padding: 0 1rem; }
        .ttd .sig-line { display: block; margin: 3rem auto 0.3rem; width: 120px; border-bottom: 1px solid #c4a484; }
        .print-meta { margin-top: 2rem; font-size: 0.75rem; color: #8a7060; font-style: italic; line-height: 1.7; }
        .no-print { margin-top: 1.5rem; display: inline-block; padding: 0.6rem 1.5rem; font-family: 'Jost', sans-serif; font-size: 0.72rem; font-weight: 500; letter-spacing: 0.2em; text-transform: uppercase; background: #c4a484; color: #fff; border: none; cursor: pointer; }
        .no-print:hover { background: #a88860; }
        @media print { .no-print { display: none; } body { padding: 1rem; } }
    </style>
</head>
<body>

<div class="print-header">
    <div class="brand">Kama Spa</div>
    <div class="brand-sub">Wellness &amp; Serenity</div>
    <div class="brand-info">
        Jl. Barito 1, No 21 Kramat Pela, Kebayoran Baru, Jakarta Selatan<br>
        Telepon : 0813 1605 2040
    </div>
</div>

<div class="doc-title">Bukti Kas</div>

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
        <th>Tanggal</th>
        <th>Debit</th>
        <th>Kredit</th>
        <th>Jenis Biaya</th>
        <th>Bukti Foto</th>
        <th>Catatan</th>
    </tr>
    @foreach ($parent->cashChild as $i => $row)
    <tr>
        <td>{{ $i+1 }}</td>
        <td>{{ $row->date }}</td>
        <td>Rp {{ number_format($row->debit, 0, ',', '.') }}</td>
        <td>Rp {{ number_format($row->credit, 0, ',', '.') }}</td>
        <td>{{ $row->type_payment }}</td>
        <td style="width: 180px;">
            @if($row->proof_payment)
            <img src="{{ asset('storage/' . $row->proof_payment) }}" alt="Bukti" style="width:180px; height:auto; object-fit:cover;">
            @endif
        </td>
        <td>{{ $row->notes }}</td>
    </tr>
    @endforeach
</table>

<table class="ttd">
    <tr>
        <td>Dibuat Oleh<span class="sig-line"></span>( Finance )</td>
        <td>Mengetahui<span class="sig-line"></span>( Direktur )</td>
        <td>Menyetujui<span class="sig-line"></span>( Komisaris )</td>
    </tr>
</table>

<div class="print-meta">
    Tanggal Cetak: {{ now() }}<br>
    Oleh Keuangan
</div>

<br>
<button class="no-print" onclick="window.print()">Print</button>

<script>
    window.onload = () => window.print()
</script>

</body>
</html>