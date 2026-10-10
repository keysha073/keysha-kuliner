@extends('layouts.admin')
@section('title', ($mode === 'create' ? 'Tambah' : 'Edit') . ' Data Pelanggan - Keysha Kuliner')
@section('heading', ($mode === 'create' ? 'Tambah' : 'Edit') . ' Data Pelanggan')
@section('content')
<div class="content-card p-3 p-lg-4">
 <div class="mb-4"><h4 class="fw-bold">{{ $mode === 'create' ? 'Tambah' : 'Edit' }} Data Pelanggan</h4><p class="text-secondary mb-0">Isi formulir di bawah. Kolom bertanda wajib harus diisi.</p></div>
 <form method="POST" action="{{ $mode === 'create' ? route('pelanggan.store') : route('pelanggan.update', $item) }}">
 @csrf
 @if($mode === 'edit') @method('PUT') @endif
 <div class="row g-3"><div class="col-md-6"><label for="nama" class="form-label fw-semibold">Nama Pelanggan</label><input type="text" name="nama" id="nama" class="form-control" value="{{ old("nama", $item->nama) }}" required ><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="email" class="form-label fw-semibold">Email</label><input type="email" name="email" id="email" class="form-control" value="{{ old("email", $item->email) }}" required ><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="telepon" class="form-label fw-semibold">Nomor Telepon</label><input type="text" name="telepon" id="telepon" class="form-control" value="{{ old("telepon", $item->telepon) }}" required ><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="alamat" class="form-label fw-semibold">Alamat</label><textarea name="alamat" id="alamat" rows="3" class="form-control" >{{ old("alamat", $item->alamat) }}</textarea><div class="form-text">Opsional.</div></div>
</div>
 <div class="d-flex gap-2 mt-4"><button class="btn btn-orange" type="submit">{{ $mode === 'create' ? 'Simpan Data' : 'Perbarui Data' }}</button><a href="{{ route('pelanggan.index') }}" class="btn btn-light border">Batal</a></div>
 </form>
</div>
@endsection
