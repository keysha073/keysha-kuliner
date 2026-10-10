@extends('layouts.admin')
@section('title', ($mode === 'create' ? 'Tambah' : 'Edit') . ' Data Reservasi - Keysha Kuliner')
@section('heading', ($mode === 'create' ? 'Tambah' : 'Edit') . ' Data Reservasi')
@section('content')
<div class="content-card p-3 p-lg-4">
 <div class="mb-4"><h4 class="fw-bold">{{ $mode === 'create' ? 'Tambah' : 'Edit' }} Data Reservasi</h4><p class="text-secondary mb-0">Isi formulir di bawah. Kolom bertanda wajib harus diisi.</p></div>
 <form method="POST" action="{{ $mode === 'create' ? route('reservasi.store') : route('reservasi.update', $item) }}">
 @csrf
 @if($mode === 'edit') @method('PUT') @endif
 <div class="row g-3"><div class="col-md-6"><label for="nama_pemesan" class="form-label fw-semibold">Nama Pemesan</label><input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control" value="{{ old("nama_pemesan", $item->nama_pemesan) }}" required ><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="tanggal" class="form-label fw-semibold">Tanggal Reservasi</label><input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old("tanggal", $item->exists ? $item->tanggal->format("Y-m-d") : "") }}" required ><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="jam" class="form-label fw-semibold">Jam Reservasi</label><input type="time" name="jam" id="jam" class="form-control" value="{{ old("jam", $item->jam ? substr($item->jam,0,5) : "") }}" required ><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="jumlah_orang" class="form-label fw-semibold">Jumlah Orang</label><input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control" value="{{ old("jumlah_orang", $item->jumlah_orang) }}" required min="1" max="30"><div class="form-text">Wajib diisi.</div></div>
<div class="col-md-6"><label for="status" class="form-label fw-semibold">Status</label><select name="status" id="status" class="form-select" required><option value="">-- Pilih Status --</option><option value="Menunggu" @selected(old("status", $item->status) === "Menunggu")>Menunggu</option><option value="Dikonfirmasi" @selected(old("status", $item->status) === "Dikonfirmasi")>Dikonfirmasi</option><option value="Selesai" @selected(old("status", $item->status) === "Selesai")>Selesai</option><option value="Dibatalkan" @selected(old("status", $item->status) === "Dibatalkan")>Dibatalkan</option></select><div class="form-text">Wajib diisi.</div></div>
</div>
 <div class="d-flex gap-2 mt-4"><button class="btn btn-orange" type="submit">{{ $mode === 'create' ? 'Simpan Data' : 'Perbarui Data' }}</button><a href="{{ route('reservasi.index') }}" class="btn btn-light border">Batal</a></div>
 </form>
</div>
@endsection
