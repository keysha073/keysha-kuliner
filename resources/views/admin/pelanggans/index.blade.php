@extends('layouts.admin')
@section('title','Data Pelanggan - Keysha Kuliner')
@section('heading','Data Pelanggan')
@section('content')
<div class="content-card p-3 p-lg-4">
 <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-4">
  <div><h4 class="fw-bold mb-1">Data Pelanggan</h4><div class="text-secondary small">Kelola data data pelanggan menggunakan fitur CRUD.</div></div>
  <a href="{{ route('pelanggan.create') }}" class="btn btn-orange align-self-md-center">＋ Tambah Pelanggan</a>
 </div>
 <div class="row mb-3"><div class="col-md-5"><input id="search-pelanggans" class="form-control" placeholder="Cari data..." oninput="filterTable('search-pelanggans','table-pelanggans')"></div><div class="col-md-7 text-md-end text-secondary small mt-2 mt-md-0">Total data: {{ $items->count() }}</div></div>
 <div class="table-responsive"><table class="table align-middle" id="table-pelanggans"><thead><tr><th>No.</th><th>Nama</th><th>Email</th><th>Telepon</th><th>Alamat</th><th class="text-end">Aksi</th></tr></thead><tbody>
 @forelse($items as $item)<tr><td>{{ $loop->iteration }}</td><td>{{ $item->nama ?? '-' }}</td><td>{{ $item->email ?? '-' }}</td><td>{{ $item->telepon ?? '-' }}</td><td>{{ $item->alamat ?? '-' }}</td><td class="text-end text-nowrap">
 <a href="{{ route('pelanggan.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
 <form action="{{ route('pelanggan.destroy', $item) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" data-confirm="Yakin ingin menghapus data ini?">Hapus</button></form>
 </td></tr>@empty<tr><td colspan="6" class="text-center text-secondary py-5">Belum ada data. Klik tombol “Tambah Pelanggan” untuk menambahkan data pertama.</td></tr>@endforelse
 </tbody></table></div>
</div>
@endsection
