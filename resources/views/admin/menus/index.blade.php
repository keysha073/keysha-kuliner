@extends('layouts.admin')
@section('title','Data Menu - Keysha Kuliner')
@section('heading','Data Menu')
@section('content')
<div class="content-card p-3 p-lg-4">
 <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-4">
  <div><h4 class="fw-bold mb-1">Data Menu</h4><div class="text-secondary small">Kelola data data menu menggunakan fitur CRUD.</div></div>
  <a href="{{ route('menu.create') }}" class="btn btn-orange align-self-md-center">＋ Tambah Menu</a>
 </div>
 <div class="row mb-3"><div class="col-md-5"><input id="search-menus" class="form-control" placeholder="Cari data..." oninput="filterTable('search-menus','table-menus')"></div><div class="col-md-7 text-md-end text-secondary small mt-2 mt-md-0">Total data: {{ $items->count() }}</div></div>
 <div class="table-responsive"><table class="table align-middle" id="table-menus"><thead><tr><th>No.</th><th>Nama Menu</th><th>Kategori</th><th>Harga</th><th>Stok</th><th class="text-end">Aksi</th></tr></thead><tbody>
 @forelse($items as $item)<tr><td>{{ $loop->iteration }}</td><td>{{ $item->nama_menu ?? '-' }}</td><td>{{ $item->kategori ?? '-' }}</td><td>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</td><td>{{ $item->stok ?? '-' }}</td><td class="text-end text-nowrap">
 <a href="{{ route('menu.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
 <form action="{{ route('menu.destroy', $item) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" data-confirm="Yakin ingin menghapus data ini?">Hapus</button></form>
 </td></tr>@empty<tr><td colspan="6" class="text-center text-secondary py-5">Belum ada data. Klik tombol “Tambah Menu” untuk menambahkan data pertama.</td></tr>@endforelse
 </tbody></table></div>
</div>
@endsection
