@extends('components.leader.dashboard')
@section("dashboard")
<h2 class="ks-page-title">Manajemen User</h2>

<div class="ks-card">
    <div class="ks-card-header">
        <i class="mdi mdi-account-edit-outline"></i>
        Update Data User
    </div>
    <form action="{{ route('updateUser', 'leaderDashboard') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="ks-card-body">
            <div class="ks-form-group">
                <label for="name" class="ks-label">Nama Lengkap</label>
                <input type="text" class="ks-input" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required>
            </div>
            <div class="ks-form-group">
                <label for="email" class="ks-label">Email</label>
                <input type="email" class="ks-input" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
            </div>
            <div class="ks-form-group">
                <label for="password" class="ks-label">Password Baru (Opsional)</label>
                <input type="password" class="ks-input" id="password" name="password" placeholder="Isi jika ingin mengganti password">
            </div>
        </div>
        <div class="ks-card-footer">
            <button type="submit" class="ks-btn ks-btn-primary">
                <i class="mdi mdi-content-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
