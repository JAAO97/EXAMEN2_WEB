<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Inicio de Sesión | DISFARMA Honduras</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body {
            background-color: #f4f6f9;
        }

        .login-container {
            min-height: 100vh;
        }

        .login-card {
            max-width: 430px;
            width: 100%;
            border-radius: 15px;
        }

        .logo-title {
            color: #0d6efd;
            font-weight: 700;
        }

    </style>

</head>

<body>

<div class="container login-container d-flex align-items-center justify-content-center">

    <div class="card login-card shadow border-0">

        <div class="card-body p-4 p-md-5">

            <div class="text-center mb-4">

                <i class="bi bi-capsule-pill display-4 text-primary"></i>

                <h2 class="logo-title mt-2">
                    DISFARMA
                </h2>

                <p class="text-muted mb-0">
                    Honduras
                </p>

                <small class="text-muted">
                    Sistema Integral de Gestión
                </small>

            </div>

            <form method="POST"
                  action="{{ route('login.post') }}">

                @csrf

                <div class="mb-3">

                    <label for="email"
                           class="form-label">

                        Correo electrónico institucional

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="usuario@disfarma.hn"
                            class="form-control @error('email') is-invalid @enderror">

                        @error('email')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

                <div class="mb-3">

                    <label for="password"
                           class="form-label">

                        Contraseña

                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror">

                        @error('password')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

                <div class="form-check mb-4">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="remember"
                        id="remember"
                        value="1">

                    <label
                        class="form-check-label"
                        for="remember">

                        Recordar mi sesión

                    </label>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary w-100">

                    <i class="bi bi-box-arrow-in-right me-1"></i>

                    Iniciar sesión

                </button>

            </form>

        </div>

        <div class="card-footer text-center bg-white border-0 pb-4">

            <small class="text-muted">
                Droguería y Distribuidora Farmacéutica
                San Rafael S. de R.L.
            </small>

        </div>

    </div>

</div>

</body>

</html>