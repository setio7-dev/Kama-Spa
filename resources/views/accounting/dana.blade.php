@extends('components.accounting.dashboard')
@section('dashboard')
<h2 class="ks-page-title">Pengiriman Kas</h2>

<div class="ks-card">
    <div class="ks-card-body">
        <div class="ks-table-wrap">
            <table class="ks-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cash as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>Rp. {{ number_format($data->nominal, 0, ',', '.') }}</td>
                        <td>
                            <span class="ks-badge {{ $data->status === 'rejected' ? 'ks-badge-danger' : ($data->status === 'pending' ? 'ks-badge-warning' : 'ks-badge-success') }}">
                                {{ $data->status }}
                            </span>
                        </td>
                        <td>{{ $data->created_at->toDateString() }}</td>
                        <td>
                            <button class="ks-btn ks-btn-primary" style="padding: 0.45rem 0.9rem;"
                                onclick="document.getElementById('overlay-{{ $data->id }}').classList.add('open')">
                                Aksi
                            </button>
                        </td>
                    </tr>

                    <div class="ks-modal-overlay" id="overlay-{{ $data->id }}" onclick="this.classList.remove('open')">
                        <div class="ks-modal" onclick="event.stopPropagation()">
                            <form action="{{ route('keuanganDanaStatus', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="ks-modal-header">
                                    <span>Aksi Pengiriman Kas</span>
                                    <button type="button" class="ks-modal-close" onclick="document.getElementById('overlay-{{ $data->id }}').classList.remove('open')">&times;</button>
                                </div>
                                <div class="ks-modal-body">
                                    <div class="ks-form-group">
                                        <label class="ks-label">Catatan</label>
                                        <textarea name="notes" class="ks-textarea" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="ks-modal-footer">
                                    <button type="submit" name="status" value="rejected" class="ks-btn ks-btn-danger" @if($data->status !== 'pending') disabled @endif>
                                        Rejected
                                    </button>
                                    <button type="submit" name="status" value="accepted" class="ks-btn ks-btn-success" @if($data->status !== 'pending') disabled @endif>
                                        Accepted
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection