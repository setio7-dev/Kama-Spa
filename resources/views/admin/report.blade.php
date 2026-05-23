@extends('components.admin.dashboard')
@section('dashboard')
<h2 class="ks-page-title">Laporan Kas</h2>

<div class="ks-card">
    <div class="ks-card-body">
        <div class="ks-table-wrap">
            <table class="ks-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Saldo Awal</th>
                        <th>Saldo Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($closeKasParent as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->created_at->toDateString() }}</td>
                        <td>Rp. {{ number_format($data->opening_kas, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($data->ending_kas, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('adminReportPrint', $data->id) }}" target="_blank">
                                <button class="ks-btn ks-btn-success" style="padding: 0.45rem 0.9rem;">Cetak</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection