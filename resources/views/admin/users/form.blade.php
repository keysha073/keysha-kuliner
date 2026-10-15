
@extends('layouts.admin')

@section('title', ($user->exists ? 'Edit User' : 'Tambah User') . ' - Keysha Kuliner')

@section('heading', $user->exists ? 'Edit User' : 'Tambah User')

@section('content')

<div class="content-card p-4">

    {{-- HEADER FORM --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">
            {{ $user->exists ? 'Edit Data User' : 'Tambah User Baru' }}
        </h4>

        <p class="text-secondary mb-0">
            {{ $user->exists
                ? 'Perbarui informasi akun pengguna.'
                : 'Masukkan informasi untuk membuat akun pengguna baru.' }}
        </p>
    </div>

    {{-- FORM USER --}}
    <form
        action="{{ $user->exists
            ? route('user.update', $user->id)
            : route('user.store') }}"
        method="POST"
    >

        @csrf

        @if ($user->exists)
            @method('PUT')
        @endif

        {{-- NAMA --}}
        <div class="mb-3">
            <label for="name" class="form-label">
                Nama lengkap <span class="text-danger">*</span>
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}"
                placeholder="Masukkan nama lengkap"
                maxlength="255"
                required
            >

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- EMAIL --}}
        <div class="mb-3">
            <label for="email" class="form-label">
                Alamat email <span class="text-danger">*</span>
            </label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}"
                placeholder="contoh@email.com"
                maxlength="255"
                required
            >

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- PASSWORD --}}
        <div class="mb-3">
            <label for="password" class="form-label">
                Password

                @if (!$user->exists)
                    <span class="text-danger">*</span>
                @else
                    <span class="text-secondary">(Opsional saat edit)</span>
                @endif
            </label>

            <input
                type="password"
                id="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="{{ $user->exists
                    ? 'Kosongkan jika tidak ingin mengganti password'
                    : 'Minimal 8 karakter' }}"
                minlength="8"
                {{ $user->exists ? '' : 'required' }}
                autocomplete="new-password"
            >

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- KONFIRMASI PASSWORD --}}
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">
                Konfirmasi password

                @if (!$user->exists)
                    <span class="text-danger">*</span>
                @endif
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="form-control"
                placeholder="Ulangi password"
                minlength="8"
                {{ $user->exists ? '' : 'required' }}
                autocomplete="new-password"
            >
        </div>

        {{-- TOMBOL --}}
        <div class="d-flex flex-wrap gap-2">

            <button type="submit" class="btn btn-orange">
                {{ $user->exists ? 'Simpan Perubahan' : 'Simpan User' }}
            </button>

            <a href="{{ route('user.index') }}"
               class="btn btn-outline-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection
