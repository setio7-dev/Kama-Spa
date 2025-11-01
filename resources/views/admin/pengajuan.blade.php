@extends('components.admin.dashboard')
@section('dashboard')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Req Pengajuan</h4>
                <form class="forms-sample" action="{{ route('adminPengajuanPost') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Nominal</label>
                        <input type="number" name="nominal" class="form-control" id="exampleInputName1" placeholder="Nominal">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Riwayat Kas</h4>
                </p>
                <div class="table-responsive">
                    <table class="table">
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
                                <td><label class="badge {{ $data->status === 'rejected' ? 'badge-danger' : ($data->status === 'pending' ? 'badge-warning' : 'badge-success') }}">{{ $data->status }}</label></td>
                            </tr>    
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection