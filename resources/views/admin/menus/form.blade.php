@extends('layouts.admin')
@section('title', ($mode === 'create' ? 'Tambah' : 'Edit') . ' Data Menu - Keysha Kuliner')
@section('heading', ($mode === 'create' ? 'Tambah' : 'Edit') . ' Data Menu')
@section('content')
<div class="content-card p-3 p-lg-4">
 <div class="mb-4"><h4 class="fw-bold">{{ $mode === 'create' ? 'Tambah' : 'Edit' }} Data Menu</h4><p class="text-secondary mb-0">Isi formulir di bawah. Kolom bertanda wajib harus diisi.</p></div>
 <form method="POST" action="{{ $mode === 'create' ? route('menu.store') : route('menu.update', $item) }}">
 @csrf
 @if($mode === 'edit') @method('PUT') @endif
 <div class="row g-3"><div class="col-md-6"><label for="nama_menu" class="form-label fw-semibold">Nama Menu</label><input type="text" name="nama_menu" id="nama_menu" class="form-control" value="{{ old("nama_menu", $item->nama_menu) }}" required ><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="kategori" class="form-label fw-semibold">Kategori</label><select name="kategori" id="kategori" class="form-select" required><option value="">-- Pilih Kategori --</option><option value="Makanan" @selected(old("kategori", $item->kategori) === "Makanan")>Makanan</option><option value="Minuman" @selected(old("kategori", $item->kategori) === "Minuman")>Minuman</option><option value="Camilan" @selected(old("kategori", $item->kategori) === "Camilan")>Camilan</option></select><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="harga" class="form-label fw-semibold">Harga (Rp)</label><input type="number" name="harga" id="harga" class="form-control" value="{{ old("harga", $item->harga) }}" required min="0" step="1"><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="stok" class="form-label fw-semibold">Stok</label><input type="number" name="stok" id="stok" class="form-control" value="{{ old("stok", $item->stok) }}" required min="0" step="1"><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="deskripsi" class="form-label fw-semibold">Deskripsi</label><textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" >{{ old("deskripsi", $item->deskripsi) }}</textarea><div class="form-text">Opsional.</div></div>
</div>
 <div class="d-flex gap-2 mt-4"><button class="btn btn-orange" type="submit">{{ $mode === 'create' ? 'Simpan Data' : 'Perbarui Data' }}</button><a href="{{ route('menu.index') }}" class="btn btn-light border">Batal</a></div>
 </form>
</div>
@endsection
