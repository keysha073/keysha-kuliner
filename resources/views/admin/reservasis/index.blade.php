@extends('layouts.admin')
@section('title','Data Reservasi - Keysha Kuliner')
@section('heading','Data Reservasi')
@section('content')
<div class="content-card p-3 p-lg-4">
 <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-4">
  <div><h4 class="fw-bold mb-1">Data Reservasi</h4><div class="text-secondary small">Kelola data data reservasi menggunakan fitur CRUD.</div></div>
  <a href="{{ route('reservasi.create') }}" class="btn btn-orange align-self-md-center">＋ Tambah Reservasi</a>
 </div>
 <div class="row mb-3"><div class="col-md-5"><input id="search-reservasis" class="form-control" placeholder="Cari data..." oninput="filterTable('search-reservasis','table-reservasis')"></div><div class="col-md-7 text-md-end text-secondary small mt-2 mt-md-0">Total data: {{ $items->count() }}</div></div>
 <div class="table-responsive"><table class="table align-middle" id="table-reservasis"><thead><tr><th>No.</th><th>Nama Pemesan</th><th>Tanggal</th><th>Jam</th><th>Jumlah Orang</th><th>Status</th><th class="text-end">Aksi</th></tr></thead><tbody>
 @forelse($items as $item)<tr><td>{{ $loop->iteration }}</td><td>{{ $item->nama_pemesan ?? '-' }}</td><td>{{ $item->tanggal->format('d/m/Y') }}</td><td>{{ substr($item->jam, 0, 5) }}</td><td>{{ $item->jumlah_orang ?? '-' }}</td><td>{{ $item->status ?? '-' }}</td><td class="text-end text-nowrap">
 <a href="{{ route('reservasi.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
 <form action="{{ route('reservasi.destroy', $item) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" data-confirm="Yakin ingin menghapus data ini?">Hapus</button></form>
 </td></tr>@empty<tr><td colspan="7" class="text-center text-secondary py-5">Belum ada data. Klik tombol “Tambah Reservasi” untuk menambahkan data pertama.</td></tr>@endforelse
 </tbody></table></div>
</div>
@endsection
