@extends('layouts.admin')
@section('title','Dashboard - Keysha Kuliner')
@section('heading','Dashboard')
@section('content')
<div class="p-4 p-lg-5 rounded-4 mb-4 text-white" style="background:linear-gradient(120deg,#172554,#7c3aed,#f97316)">
 <div class="small text-uppercase mb-2">Sistem Informasi Kuliner</div><h1 class="fw-bold">Selamat Datang di Keysha Kuliner!</h1>
 <p class="mb-0">Kelola data menu, pelanggan, dan reservasi dengan mudah dalam satu dashboard.</p>
</div>
<div class="row g-3 mb-4">
 <div class="col-md-4"><div class="content-card p-4 h-100"><div class="text-secondary">Total Menu</div><div class="display-5 fw-bold">{{ $menuCount }}</div><a href="{{ route('menu.index') }}" class="btn btn-orange mt-3">Kelola Menu →</a></div></div>
 <div class="col-md-4"><div class="content-card p-4 h-100"><div class="text-secondary">Total Pelanggan</div><div class="display-5 fw-bold">{{ $pelangganCount }}</div><a href="{{ route('pelanggan.index') }}" class="btn btn-orange mt-3">Kelola Pelanggan →</a></div></div>
 <div class="col-md-4"><div class="content-card p-4 h-100"><div class="text-secondary">Total Reservasi</div><div class="display-5 fw-bold">{{ $reservasiCount }}</div><a href="{{ route('reservasi.index') }}" class="btn btn-orange mt-3">Kelola Reservasi →</a></div></div>
</div>
<div class="content-card p-4"><h5 class="fw-bold">Checklist fitur tugas Pertemuan 6</h5><div class="row g-2 mt-2"><div class="col-md-6">✅ Create, Read, Update, Delete (CRUD)</div><div class="col-md-6">✅ Validasi input</div><div class="col-md-6">✅ Redirect setelah proses</div><div class="col-md-6">✅ Flash message sukses dan error</div><div class="col-md-6">✅ Form mengisi ulang input lama</div><div class="col-md-6">✅ Pencarian data pada tabel</div></div></div>
@endsection
