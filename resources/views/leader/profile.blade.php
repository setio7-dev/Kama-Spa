@extends('components.admin.dashboard')
@section("dashboard")
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark">Manajemen User</h4>
    </div>

    <div class="card border-0 shadow-lg rounded-4" style="background-color: #fffaf5;">
        <div class="card-header" style="background-color: rgb(196, 164, 132); color: white; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
            <h5 class="fw-bold mb-0"><i class="mdi mdi-account-edit-outline"></i> Update Data User</h5>
        </div>
        <form action="{{ route('updateUser', 'leaderDashboard') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold text-dark">Nama Lengkap</label>
                    <input type="text" class="form-control shadow-sm" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold text-dark">Email</label>
                    <input type="email" class="form-control shadow-sm" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold text-dark">Password Baru (Opsional)</label>
                    <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Isi jika ingin mengganti password">
                </div>
            </div>
            <div class="card-footer border-0 d-flex justify-content-between">
                <button type="submit" class="btn text-white shadow-sm" style="background-color: rgb(196, 164, 132);">
                    <i class="mdi mdi-content-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .form-control:focus {
        border-color: rgb(196, 164, 132);
        box-shadow: 0 0 0 0.25rem rgba(196, 164, 132, 0.25);
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>
@endsection
