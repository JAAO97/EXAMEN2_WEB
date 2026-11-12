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

        body {
            background-color: #f5f6f8;
        }

        .sidebar {
            min-height: calc(100vh - 56px);
            background-color: #212529;
        }

        .sidebar .nav-link {
            color: #ced4da;
            border-radius: 6px;
            margin-bottom: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: #343a40;
            color: #ffffff;
        }

        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #ffffff;
        }

        .content-area {
            min-height: calc(100vh - 115px);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: .5px;
        }

        footer {
            background-color: white;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-dark bg-primary navbar-expand-lg">

    <div class="container-fluid">

        <a class="navbar-brand"
           href="{{ route('dashboard') }}">

            <i class="bi bi-capsule-pill me-2"></i>

            DISFARMA Honduras

        </a>

        <div class="d-flex align-items-center gap-3 text-white">

            <span>

                <i class="bi bi-person-circle me-1"></i>

                {{ Auth::user()->name }}

            </span>

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

            <div class="text-center text-white mb-4">

                <img src="{{ asset('images/logo-disfarma.png') }}"
                    alt="Logo DISFARMA" class="img-fluid" style="max-height: 80px;">

                <h6 class="mt-2 mb-0">
                    Gestión Integral
                </h6>

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