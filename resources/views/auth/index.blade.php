@extends('layouts.admin')

@section('title', 'Data User - Keysha Kuliner')

@section('heading', 'Data User')

@section('content')

<div class="content-card p-4">

    {{-- HEADER HALAMAN --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1">Data User</h4>
            <p class="text-secondary mb-0">
                Kelola akun pengguna aplikasi Keysha Kuliner.
            </p>
        </div>

        <a href="{{ route('user.create') }}"
           class="btn btn-orange">
            + Tambah User
        </a>
    </div>

    {{-- PENCARIAN --}}
    <div class="mb-3">
        <label for="searchUser" class="form-label">
            Cari pengguna
        </label>

        <input type="text"
               id="searchUser"
               class="form-control"
               placeholder="Cari nama atau email...">
    </div>

    {{-- TABEL USER --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle" id="userTable">

            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            {{ $users->firstItem() + $loop->index }}
                        </td>

                        <td>
                            <span class="fw-semibold">
                                {{ $user->name }}
                            </span>
                        </td>

                        <td>{{ $user->email }}</td>

                        <td>
                            {{ $user->created_at?->format('d-m-Y') ?? '-' }}
                        </td>

                        <td>
                            <div class="d-flex justify-content-center gap-2">

                                {{-- EDIT USER --}}
                                <a href="{{ route('user.edit', $user->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                {{-- HAPUS USER --}}
                                <form action="{{ route('user.destroy', $user->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5"
                            class="text-center text-secondary py-4">
                            Belum ada data user.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-3">
        {{ $users->links() }}
    </div>

</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchUser');
        const rows = document.querySelectorAll('#userTable tbody tr');

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase();

            rows.forEach(function (row) {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(keyword) ? '' : 'none';
            });
        });
    });
</script>
@endpush
