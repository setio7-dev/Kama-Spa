@extends('components.admin.dashboard')
@section('dashboard')
<h2 class="ks-page-title">Pengelolaan Kas</h2>

<div class="ks-grid-4" style="margin-bottom: 1.5rem;">
    <div class="ks-stat-card">
        <p class="ks-stat-label">Saldo Awal</p>
        <p class="ks-stat-value">Rp. {{ number_format($total, 0, ',', '.') }}</p>
    </div>
    <div class="ks-stat-card">
        <p class="ks-stat-label">Saldo Akhir</p>
        <p class="ks-stat-value">Rp. {{ number_format($totalClosing, 0, ',', '.') }}</p>
    </div>
    <div class="ks-stat-card">
        <p class="ks-stat-label">Total Debit</p>
        <p class="ks-stat-value">Rp. {{ number_format($debit, 0, ',', '.') }}</p>
    </div>
    <div class="ks-stat-card">
        <p class="ks-stat-label">Total Credit</p>
        <p class="ks-stat-value">Rp. {{ number_format($credit, 0, ',', '.') }}</p>
    </div>
</div>

<div class="ks-card" style="margin-bottom: 1.5rem;">
    <div class="ks-card-body">
        <div class="ks-tab-group">
            <div class="ks-tab active" id="tabCredit" onclick="switchTab('credit')">Kredit</div>
            <div class="ks-tab" id="tabDebit" onclick="switchTab('debit')">Debit</div>
        </div>

        <form id="formCredit" action="{{ route('adminPengelolaanCreditPost') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="ks-form-group">
                <label class="ks-label">Nominal</label>
                <input type="number" name="credit" class="ks-input" placeholder="Nominal">
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Jenis Barang</label>
                <select name="type_payment" class="ks-select">
                    <option value="Alat Kebersihan">Alat Kebersihan</option>
                    <option value="Transportasi">Transportasi</option>
                    <option value="Komisi">Komisi</option>
                    <option value="Konsumsi">Konsumsi</option>
                    <option value="Alat Kantor">Alat Kantor</option>
                    <option value="Lain-lain">Lain-Lainnya</option>
                </select>
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Bukti Pembayaran</label>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <input type="text" class="ks-input file-upload-info" disabled placeholder="Upload gambar...">
                    <button type="button" class="ks-btn ks-btn-primary file-upload-browse">Unggah</button>
                </div>
                <input type="file" name="image" class="file-upload-default" style="display:none;">
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Tanggal</label>
                <input type="date" name="date" class="ks-input">
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Deskripsi</label>
                <textarea name="desc" class="ks-textarea" rows="4"></textarea>
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Catatan</label>
                <textarea name="notes" class="ks-textarea" rows="4"></textarea>
            </div>
            <button type="submit" class="ks-btn ks-btn-primary">Tambah</button>
        </form>

        <form id="formDebit" action="{{ route('adminPengelolaanDebitPost') }}" method="post" enctype="multipart/form-data" style="display: none;">
            @csrf
            <div class="ks-form-group">
                <label class="ks-label">Nominal</label>
                <input type="number" name="debit" class="ks-input" placeholder="Nominal">
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Jenis Barang</label>
                <select name="type_payment" class="ks-select">
                    <option value="Kas Masuk">Kas Masuk</option>
                </select>
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Bukti Pembayaran</label>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <input type="text" class="ks-input file-upload-info" disabled placeholder="Upload gambar...">
                    <button type="button" class="ks-btn ks-btn-primary file-upload-browse">Unggah</button>
                </div>
                <input type="file" name="image" class="file-upload-default" style="display:none;">
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Tanggal</label>
                <input type="date" name="date" class="ks-input">
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Deskripsi</label>
                <textarea name="desc" class="ks-textarea" rows="4"></textarea>
            </div>
            <div class="ks-form-group">
                <label class="ks-label">Catatan</label>
                <textarea name="notes" class="ks-textarea" rows="4"></textarea>
            </div>
            <button type="submit" class="ks-btn ks-btn-primary">Tambah</button>
        </form>
    </div>
</div>

<div class="ks-card">
    <div class="ks-card-body">
        <div style="margin-bottom: 1.2rem;">
            <form action="{{ route('adminPengelolaanClosingPost') }}" method="post">
                @csrf
                <button type="submit" class="ks-btn ks-btn-danger">
                    <i class="mdi mdi-lock-outline"></i> Tutup Kas
                </button>
            </form>
        </div>
        <div class="ks-table-wrap">
            <table class="ks-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Jenis Barang</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listPayment as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->date }}</td>
                        <td>Rp. {{ number_format($data->debit, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($data->credit, 0, ',', '.') }}</td>
                        <td>{{ $data->type_payment }}</td>
                        <td>{{ $data->notes }}</td>
                        <td style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            <a href="{{ route('adminPengelolaanPrint', $data->id) }}" target="_blank">
                                <button class="ks-btn ks-btn-success" style="padding: 0.45rem 0.9rem;">Cetak</button>
                            </a>
                            <form action="{{ route('adminPengelolaanDelete', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ks-btn ks-btn-danger" style="padding: 0.45rem 0.9rem;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        const tabCredit = document.getElementById('tabCredit');
        const tabDebit = document.getElementById('tabDebit');
        const formCredit = document.getElementById('formCredit');
        const formDebit = document.getElementById('formDebit');

        if (tab === 'credit') {
            tabCredit.classList.add('active');
            tabDebit.classList.remove('active');
            formCredit.style.display = '';
            formDebit.style.display = 'none';
        } else {
            tabDebit.classList.add('active');
            tabCredit.classList.remove('active');
            formCredit.style.display = 'none';
            formDebit.style.display = '';
        }
    }

    document.querySelectorAll('.file-upload-browse').forEach(button => {
        const formGroup = button.closest('.ks-form-group');
        const input = formGroup.querySelector('.file-upload-default');
        const textInput = formGroup.querySelector('.file-upload-info');

        button.addEventListener('click', e => {
            e.stopPropagation();
            input.click();
        });

        input.addEventListener('change', () => {
            if (input.files.length) textInput.value = input.files[0].name;
        });
    });
</script>
@endsection
