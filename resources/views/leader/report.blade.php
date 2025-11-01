@extends('components.leader.dashboard')
@section('dashboard')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Laporan Kas</h4>
            </p>
            <div class="table-responsive">
                <table class="table">
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
                            <td>Rp. {{ number_format($data->opening_kas, 0, ',', ',') }}</td>
                            <td>Rp. {{ number_format($data->ending_kas, 0, ',', ',') }}</td>
                            <td>
                                <a href="{{ route('leaderReportPrint', $data->id) }}" target="_blank">
                                    <button class="btn btn-success text-white me-2">Cetak</button>
                                </a>
                            </td>
                        </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection