<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard | DISFARMA</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm">

        <div class="card-body">

            <h1>
                Bienvenido a DISFARMA
            </h1>

            <p>
                Usuario:
                <strong>
                    {{ Auth::user()->name }}
                </strong>
            </p>

            <p>
                Correo:
                {{ Auth::user()->email }}
            </p>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="btn btn-danger">

                    Cerrar sesión

                </button>

            </form>

        </div>

    </div>

</div>

</body>

</html>