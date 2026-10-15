
{{-- PESAN SUKSES --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        <strong>Berhasil!</strong>
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
        </button>
    </div>
@endif


{{-- PESAN ERROR DARI SESSION --}}
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show"
         role="alert">

        <strong>Terjadi kesalahan!</strong>
        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
        </button>
    </div>
@endif


{{-- PESAN VALIDASI --}}
@if ($errors->any())
    <div class="alert alert-danger" role="alert">

        <strong>Periksa kembali input kamu:</strong>

        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
@endif
