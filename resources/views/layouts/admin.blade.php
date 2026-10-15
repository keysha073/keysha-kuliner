
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Keysha Kuliner')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --navy: #172554;
            --orange: #f97316;
            --cream: #fff7ed;
        }

        body {
            background: #f5f7fb;
            color: #1f2937;
            font-family: Inter, system-ui, -apple-system, sans-serif;
        }

        .sidebar {
            background: linear-gradient(180deg, #172554, #312e81);
            min-height: 100vh;
            color: white;
            padding: 26px 18px;
        }

        .brand {
            font-size: 1.25rem;
            font-weight: 800;
            color: white;
            text-decoration: none;
        }

        .sidebar a.nav-link {
            color: #dbeafe;
            border-radius: 12px;
            padding: 11px 14px;
            margin: 5px 0;
        }

        .sidebar a.nav-link:hover,
        .sidebar a.nav-link.active {
            background: #ffffff22;
            color: #fff;
        }

        .topbar {
            background: #fff;
            border-radius: 18px;
            padding: 18px 22px;
            box-shadow: 0 5px 22px #0f172a0a;
        }

        .content-card {
            background: white;
            border: 0;
            border-radius: 20px;
            box-shadow: 0 8px 30px #0f172a0b;
        }

        .btn-orange {
            background: var(--orange);
            color: white;
            border: 0;
        }

        .btn-orange:hover {
            background: #ea580c;
            color: white;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px 12px;
        }

        .table thead th {
            background: #fff7ed;
            color: #7c2d12;
            border-bottom: 0;
            white-space: nowrap;
        }

        .badge-soft {
            background: #ffedd5;
            color: #9a3412;
        }

        @media (max-width: 767px) {
            .sidebar {
                min-height: auto;
            }

            .sidebar .nav {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .main-col {
                padding: 12px !important;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            {{-- PARTIAL VIEW: SIDEBAR --}}
            @include('partials.admin.sidebar')

            <main class="col-md-9 col-lg-10 p-3 p-lg-4 main-col">

                {{-- HEADER ADMIN --}}
                <div class="topbar d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <div class="small text-secondary">
                            ADMINISTRATOR
                        </div>

                        <strong>
                            @yield('heading', 'Dashboard')
                        </strong>
                    </div>

                    <span class="badge rounded-pill badge-soft px-3 py-2">
                        Keysha Kuliner
                    </span>
                </div>

                {{-- PARTIAL VIEW: PESAN SUKSES DAN ERROR --}}
                @include('partials.admin.flash-messages')

                {{-- KONTEN HALAMAN --}}
                @yield('content')

                {{-- FOOTER --}}
                <footer class="text-center text-secondary small py-4">
                    © {{ date('Y') }} Keysha Kuliner — Panel Administrasi
                </footer>

            </main>
        </div>
    </div>

    {{-- BOOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- KONFIRMASI HAPUS DAN FILTER TABEL --}}
    <script>
        document.querySelectorAll('[data-confirm]').forEach(el => {
            el.addEventListener('click', e => {
                if (!confirm(el.dataset.confirm)) {
                    e.preventDefault();
                }
            });
        });

        function filterTable(inputId, tableId) {
            const input = document.getElementById(inputId);

            if (!input) {
                return;
            }

            const q = input.value.toLowerCase();

            document.querySelectorAll('#' + tableId + ' tbody tr')
                .forEach(row => {
                    row.style.display = row.innerText.toLowerCase().includes(q)
                        ? ''
                        : 'none';
                });
        }
    </script>

    {{-- SCRIPT TAMBAHAN DARI HALAMAN --}}
    @stack('scripts')
</body>
</html>
