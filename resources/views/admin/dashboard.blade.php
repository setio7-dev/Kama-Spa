@extends('components.admin.dashboard')
@section('dashboard')
<div class="">
    <div class="row" style="margin-bottom: 12px;">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Selamat Datang {{ auth()->user()->name }}</h3>
        </div> 
    </div>
    <div class="row">        
        <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent" style="width: 100%;">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Saldo Sebelum Closing</p>
                        <p class="fs-30 mb-2">Rp. {{ number_format($total, 0, ',', '.') }}</p>                        
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent" style="width: 100%;">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Sisa Saldo Terakhir</p>
                        <p class="fs-30 mb-2">Rp. {{ number_format($totalClosing, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>
@endsection