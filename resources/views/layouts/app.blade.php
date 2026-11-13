<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'DISFARMA Honduras')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        :root {
            --primary: #1769e0;
            --primary-dark: #1057bd;
            --primary-soft: #eaf2ff;

            --sidebar: #1f252b;
            --sidebar-hover: #2b333b;

            --background: #f4f7fb;
            --surface: #ffffff;

            --text-primary: #20252b;
            --text-secondary: #6c757d;

            --border: #e7ebf0;

            --success-soft: #e9f8ef;
            --warning-soft: #fff7df;
            --danger-soft: #fdecec;

            --radius: 12px;
        }


        body {
            background-color: var(--background);
            color: var(--text-primary);
            font-family:
                Inter,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;
        }

        .top-navbar {
            min-height: 64px;
            background:
                linear-gradient(
                    135deg,
                    #1769e0 0%,
                    #2176ee 100%
                );

            box-shadow:
                0 2px 8px rgba(0, 0, 0, .08);

            z-index: 1030;
        }


        .navbar-brand {
            font-weight: 700;
            letter-spacing: .2px;
            font-size: 1.2rem;
        }


        .user-info {
            font-size: .92rem;
            font-weight: 500;
        }

        .sidebar {
            min-height:
                calc(100vh - 64px);

            background-color:
                var(--sidebar);

            padding:
                22px 15px;

            box-shadow:
                2px 0 8px
                rgba(0, 0, 0, .04);
        }


        .sidebar-brand-area {
            border-bottom:
                1px solid
                rgba(255,255,255,.08);

            padding-bottom: 20px;
            margin-bottom: 20px;
        }


        .sidebar-logo {
            max-height: 72px;
            max-width: 100px;
            object-fit: contain;
        }


        .sidebar-title {
            color: #ffffff;
            font-weight: 600;
            font-size: .9rem;
            margin-top: 10px;
        }


        .sidebar-section-title {
            color:
                rgba(255,255,255,.4);

            font-size: .68rem;
            text-transform: uppercase;

            letter-spacing:
                1.3px;

            margin:
                18px 10px 8px;
        }


        .sidebar .nav-link {

            color:
                rgba(255,255,255,.78);

            border-radius:
                9px;

            padding:
                11px 13px;

            margin-bottom:
                5px;

            font-size:
                .92rem;

            display:
                flex;

            align-items:
                center;

            gap:
                11px;

            transition:
                all .2s ease;
        }


        .sidebar .nav-link i {

            font-size:
                1.05rem;

            width:
                21px;

            text-align:
                center;
        }


        .sidebar .nav-link:hover {

            background-color:
                var(--sidebar-hover);

            color:
                #ffffff;

            transform:
                translateX(2px);
        }


        .sidebar .nav-link.active {

            background:
                linear-gradient(
                    135deg,
                    #1769e0,
                    #2679ed
                );

            color:
                #ffffff;

            box-shadow:
                0 4px 12px
                rgba(23,105,224,.30);
        }

        .content-area {

            min-height:
                calc(100vh - 120px);

            padding:
                32px !important;
        }


        .page-title {

            font-weight:
                700;

            font-size:
                1.65rem;

            margin-bottom:
                3px;
        }


        .page-subtitle {

            color:
                var(--text-secondary);

            margin-bottom:
                0;
        }

        .card {

            border:
                1px solid
                var(--border);

            border-radius:
                var(--radius);

            box-shadow:
                0 3px 10px
                rgba(20, 35, 55, .045);

            transition:
                box-shadow .2s ease,
                transform .2s ease;
        }


        .card:hover {

            box-shadow:
                0 7px 18px
                rgba(20, 35, 55, .07);
        }


        .card-header {

            background:
                #ffffff;

            border-bottom:
                1px solid
                var(--border);

            font-weight:
                600;
        }

        .table {

            margin-bottom:
                0;

            font-size:
                .91rem;
        }


        .table thead th {

            background:
                #f8fafc;

            color:
                #56606b;

            text-transform:
                uppercase;

            font-size:
                .70rem;

            letter-spacing:
                .55px;

            font-weight:
                700;

            border-bottom:
                1px solid
                var(--border);

            padding:
                14px 15px;

            white-space:
                nowrap;
        }


        .table tbody td {

            padding:
                14px 15px;

            vertical-align:
                middle;

            border-color:
                #eef1f5;
        }


        .table-hover tbody tr {

            transition:
                background .15s ease;
        }


        .table-hover tbody tr:hover {

            background-color:
                #f8fbff;
        }

        .btn {

            border-radius:
                8px;

            font-weight:
                500;

            transition:
                all .15s ease;
        }


        .btn-primary {

            background-color:
                var(--primary);

            border-color:
                var(--primary);
        }


        .btn-primary:hover {

            background-color:
                var(--primary-dark);

            border-color:
                var(--primary-dark);

            transform:
                translateY(-1px);
        }


        .btn-sm {

            border-radius:
                7px;
        }

        .form-control,
        .form-select {

            border-radius:
                8px;

            border-color:
                #dce1e7;

            min-height:
                40px;
        }


        .form-control:focus,
        .form-select:focus {

            border-color:
                #86b6f5;

            box-shadow:
                0 0 0 .20rem
                rgba(23,105,224,.10);
        }


        .form-label {

            font-weight:
                500;

            color:
                #343a40;

            margin-bottom:
                6px;
        }

        .badge {

            padding:
                6px 9px;

            border-radius:
                6px;

            font-weight:
                600;

            font-size:
                .72rem;
        }

        .alert {

            border-radius:
                10px;

            border:
                none;

            box-shadow:
                0 2px 7px
                rgba(0,0,0,.04);
        }

        .pagination {

            margin-bottom:
                0;
        }


        .page-link {

            border-radius:
                7px !important;

            margin:
                0 2px;

            border:
                1px solid
                #e1e5ea;

            color:
                var(--primary);
        }

        footer {

            background:
                #ffffff;

            border-top:
                1px solid
                var(--border);

            color:
                #84909c;
        }

        @media(max-width: 767px) {

            .sidebar {

                min-height:
                    auto;
            }

            .content-area {

                padding:
                    20px !important;
            }

            .user-info {

                display:
                    none;
            }
        }

        .kpi-icon {
            width: 50px;
            height: 50px;

            min-width: 50px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;
        }

        .kpi-blue {
            background-color: #eaf2ff;
            color: #1769e0;
        }

        .kpi-green {
            background-color: #e9f8ef;
            color: #198754;
        }

        .kpi-yellow {
            background-color: #fff7df;
            color: #d99b00;
        }

        .kpi-red {
            background-color: #fdecec;
            color: #dc3545;
        }

        .card h2 {
            overflow-wrap: anywhere;
        }

        .card-header {
            padding: 15px 20px;
            font-size: .92rem;
        }

        .form-text {
            font-size: .78rem;
            color: #84909c;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-dark navbar-expand-lg top-navbar">

    <div class="container-fluid">

        <a class="navbar-brand"
           href="{{ route('dashboard') }}">

            <i class="bi bi-capsule-pill me-2"></i>

            DISFARMA Honduras

        </a>

        <div class="d-flex align-items-center gap-3 text-white">

        <div class="user-info d-flex align-items-center">

            <i class="bi bi-person-circle fs-5 me-2"></i>

            <div>

                <div>
                    {{ Auth::user()->name }}
                </div>

                <small
                    style="
                        opacity:.7;
                        font-size:.70rem;
                    ">

                    Usuario autenticado

                </small>

            </div>

        </div>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="btn btn-outline-light btn-sm">

                    <i class="bi bi-box-arrow-right me-1"></i>

                    Cerrar sesión

                </button>

            </form>

        </div>

    </div>

</nav>


<div class="container-fluid">

    <div class="row">

        <aside class="col-md-2 col-lg-2 sidebar p-3">

            <div class="sidebar-brand-area text-center">

                <img
                    src="{{ asset('images/logo-disfarma.png') }}"
                    alt="DISFARMA"
                    class="sidebar-logo">

                <div class="sidebar-title">

                    Gestión Integral

                </div>

            </div>

            <div class="sidebar-section-title">

                Menú principal

            </div>

            <nav class="nav flex-column">

                <a
                    href="{{ route('dashboard') }}"
                    class="nav-link
                    {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    <i class="bi bi-speedometer2 me-2"></i>

                    Dashboard

                </a>


                <a
                    href="{{ route('medicamentos.index') }}"
                    class="nav-link
                    {{ request()->routeIs('medicamentos.*') ? 'active' : '' }}">

                    <i class="bi bi-capsule me-2"></i>

                    Medicamentos

                </a>


                <a
                    href="{{ route('proveedores.index') }}"
                    class="nav-link
                    {{ request()->routeIs('proveedores.*') ? 'active' : '' }}">

                    <i class="bi bi-truck me-2"></i>

                    Proveedores

                </a>


                <a
                    href="{{ route('empleados.index') }}"
                    class="nav-link
                    {{ request()->routeIs('empleados.*') ? 'active' : '' }}">

                    <i class="bi bi-people me-2"></i>

                    Empleados

                </a>

            </nav>

        </aside>


        <main class="col-md-10 col-lg-10 p-4 content-area">

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    <i class="bi bi-check-circle me-1"></i>

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    <i class="bi bi-exclamation-triangle me-1"></i>

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            @yield('content')

        </main>

    </div>

</div>


<footer class="border-top text-center py-3 text-muted">

    <small>

        © {{ date('Y') }} DISFARMA Honduras —
        Sistema Integral de Gestión

    </small>
    <small>

        Jeser Aziel Amaya Ortiz - UNAH.

    </small>

</footer>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@stack('scripts')

</body>

</html>