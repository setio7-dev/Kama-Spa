@extends('components.admin.dashboard')
@section('dashboard')
<h2 class="ks-page-title">Selamat Datang, {{ auth()->user()->name }}</h2>

<div class="ks-grid-2" style="margin-bottom: 1.5rem;">
    <div class="ks-stat-card">
        <p class="ks-stat-label">Saldo Sebelum Closing</p>
        <p class="ks-stat-value">Rp. {{ number_format($total, 0, ',', '.') }}</p>
    </div>
    <div class="ks-stat-card">
        <p class="ks-stat-label">Sisa Saldo Terakhir</p>
        <p class="ks-stat-value">Rp. {{ number_format($totalClosing, 0, ',', '.') }}</p>
    </div>
</div>

@include('components.graphic')
@endsection