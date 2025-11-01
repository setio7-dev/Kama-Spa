@extends('components.accounting.dashboard')
@section('dashboard')
<div class="">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pengiriman Kas</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cash as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>Rp. {{ number_format($data->nominal, '0', ',', ',') }}</td>
                                <td><label class="badge {{ $data->status === 'rejected' ? 'badge-danger' : ($data->status === 'pending' ? 'badge-warning' : 'badge-success') }}">{{ $data->status }}</label></td>
                                <td>{{ $data->created_at->toDateString() }}</td>
                                <td>
                                    <button class="btn btn-success text-white me-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalAction-{{ $data->id }}">
                                        Aksi
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modalAction-{{ $data->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('keuanganDanaStatus', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">
                                                <h5 class="modal-title">Aksi Pengiriman Kas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Catatan</label>
                                                    <textarea name="notes" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" 
                                                    name="status" 
                                                    value="rejected" 
                                                    class="btn btn-danger text-white"
                                                    @if($data->status !== 'pending') disabled @endif>
                                                    Rejected
                                                </button>

                                                <button type="submit" 
                                                    name="status" 
                                                    value="accepted" 
                                                    class="btn btn-success text-white"
                                                    @if($data->status !== 'pending') disabled @endif>
                                                    Accepted
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateStatus(id, status) {
        window.location.href = `/dana/status/${id}/${status}`;
    }
</script>
@endsection