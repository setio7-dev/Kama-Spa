@extends('components.admin.dashboard')
@section('dashboard')
<h2 class="ks-page-title">Req Pengajuan Kas</h2>

<div class="ks-card" style="margin-bottom: 1.5rem;">
    <div class="ks-card-header">
        <i class="mdi mdi-cash-plus"></i>
        Buat Pengajuan
    </div>
    <div class="ks-card-body">
        <form class="forms-sample" action="{{ route('adminPengajuanPost') }}" method="post">
            @csrf
            <div class="ks-form-group">
                <label for="nominal" class="ks-label">Nominal</label>
                <input type="number" name="nominal" id="nominal" class="ks-input" placeholder="Nominal">
            </div>
            <button type="submit" class="ks-btn ks-btn-primary">Tambah</button>
        </form>
    </div>
</div>

<div class="ks-card">
    <div class="ks-card-header">
        <i class="mdi mdi-history"></i>
        Riwayat Kas
    </div>
    <div class="ks-card-body">
        <div class="ks-table-wrap">
            <table class="ks-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cash as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>Rp. {{ number_format($data->nominal, 0, ',', '.') }}</td>
                        <td>{{ $data->created_at->toDateString() }}</td>
                        <td>
                            <span class="ks-badge {{ $data->status === 'rejected' ? 'ks-badge-danger' : ($data->status === 'pending' ? 'ks-badge-warning' : 'ks-badge-success') }}">
                                {{ $data->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection