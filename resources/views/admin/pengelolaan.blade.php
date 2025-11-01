@extends('components.admin.dashboard')
@section('dashboard')
<div class="">
    <div class="row" style="margin-bottom: 12px;">
        <div class="col-12">
            <h3 class="font-weight-bold">Pengelolaan Kas</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-white">
                <div class="card-body text-center">
                    <p class="mb-2" style="font-weight: 600;">Saldo Awal Hari Ini</p>
                    <h6 class="text-primary">Rp. {{ number_format($total, 0, ',', ',') }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-white">
                <div class="card-body text-center">
                    <p class="mb-2" style="font-weight: 600;">Saldo Akhir Hari Ini</p>
                    <h6 class="text-primary">Rp. {{ number_format($totalClosing, 0, ',', ',') }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-white">
                <div class="card-body text-center">
                    <p class="mb-2" style="font-weight: 600;">Total Debit</p>
                    <h6 class="text-primary">Rp. {{ number_format($debit, 0, ',', ',') }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-white">
                <div class="card-body text-center">
                    <p class="mb-2" style="font-weight: 600;">Total Credit</p>
                    <h6 class="text-primary">Rp. {{ number_format($credit, 0, ',', ',') }}</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex" style="gap: 20px;">
                    <h4 id="tabCredit" class="card-title text-primary" style="cursor: pointer;">Kredit</h4>
                    <h4 id="tabDebit" class="card-title" style="cursor: pointer;">Debit</h4>
                </div>

                <form id="formCredit" class="forms-sample" action="{{ route('adminPengelolaanCreditPost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="credit" class="form-control" placeholder="Nominal">
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select name="type_payment" class="form-select">
                            <option value="Alat Kebersihan">Alat Kebersihan</option>
                            <option value="Transportasi">Transportasi</option>
                            <option value="Komisi">Komisi</option>
                            <option value="Konsumsi">Konsumsi</option>
                            <option value="Lain-lain">Lain-Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bukti Pembayaran</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12 d-flex align-items-center">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append ms-2">
                                <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="notes" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Tambah</button>
                </form>

                <form id="formDebit" class="forms-sample" action="{{ route('adminPengelolaanDebitPost') }}" method="post" enctype="multipart/form-data" style="display: none;">
                    @csrf
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="debit" class="form-control" placeholder="Nominal">
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang</label>
                        <select name="type_payment" class="form-select">                            
                            <option value="Kas Masuk">Kas Masuk</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bukti Pembayaran</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12 d-flex align-items-center">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append ms-2">
                                <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="notes" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Tambah</button>
                </form>                
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('adminPengelolaanClosingPost') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger text-white">Tutup Kas</button>
                </form>
                <div class="table-responsive mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                                <th>Jenis Barang</th>
                                <th>Note</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPayment as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data->created_at->toDateString() }}</td>
                                    <td>Rp. {{ number_format($data->debit, 0, ',', ',') }}</td>
                                    <td>Rp. {{ number_format($data->credit, 0, ',', ',') }}</td>
                                    <td>{{ $data->type_payment }}</td>
                                    <td>{{ $data->notes }}</td>
                                    <td>
                                        <a href="{{ route('adminPengelolaanPrint', $data->id) }}" target="_blank">
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
</div>

<script>
    const tabCredit = document.getElementById('tabCredit');
    const tabDebit = document.getElementById('tabDebit');
    const formCredit = document.getElementById('formCredit');
    const formDebit = document.getElementById('formDebit');

    tabCredit.onclick = () => {
        tabCredit.classList.add('text-primary');
        tabDebit.classList.remove('text-primary');
        formCredit.style.display = '';
        formDebit.style.display = 'none';
    };

    tabDebit.onclick = () => {
        tabDebit.classList.add('text-primary');
        tabCredit.classList.remove('text-primary');
        formCredit.style.display = 'none';
        formDebit.style.display = '';
    };
</script>
@endsection
