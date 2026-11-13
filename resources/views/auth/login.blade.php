
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión | DISFARMA Honduras</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <style>
        :root {
            --primary: #1769e0;
            --primary-dark: #1057bd;
            --background: #f4f7fb;
            --text-primary: #20252b;
            --text-secondary: #778392;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--text-primary);
        }

        .login-page {
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 20px;
        }

        .login-container {
            width: 100%;
            max-width: 1050px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 18px 55px rgba(24, 44, 75, .11);
        }

        /* PANEL INSTITUCIONAL */

        .login-brand {
            background: linear-gradient(
                145deg,
                #1769e0 0%,
                #1057bd 55%,
                #123c83 100%
            );
            min-height: 600px;
            padding: 54px 48px;
            color: white;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .login-brand::before {
            content: "";
            position: absolute;
            width: 340px;
            height: 340px;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 50%;
            right: -160px;
            top: 100px;
        }

        .login-brand::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border: 1px solid rgba(255,255,255,.10);
            border-radius: 50%;
            left: -170px;
            bottom: -130px;
        }

        .brand-content {
            position: relative;
            z-index: 1;
        }

        .brand-logo {
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: rgba(255,255,255,.15);
            font-size: 27px;
            margin-bottom: 18px;
        }

        .brand-name {
            font-size: 1.55rem;
            font-weight: 750;
            letter-spacing: .5px;
        }

        .brand-description {
            color: rgba(255,255,255,.78);
            font-size: .9rem;
        }

        .brand-heading {
            font-size: clamp(2rem, 3vw, 2.65rem);
            font-weight: 750;
            line-height: 1.18;
            letter-spacing: -.7px;
            margin-bottom: 20px;
        }

        .brand-text {
            color: rgba(255,255,255,.8);
            font-size: .98rem;
            line-height: 1.8;
            max-width: 340px;
        }

        .brand-footer {
            color: rgba(255,255,255,.65);
            font-size: .78rem;
        }

        /* FORMULARIO */

        .login-form-area {
            min-height: 600px;
            padding: 60px 65px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-badge {
            display: inline-block;
            width: fit-content;
            color: var(--primary);
            background: #eaf2ff;
            border-radius: 30px;
            padding: 7px 14px;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .4px;
            margin-bottom: 22px;
        }

        .login-title {
            font-size: 2rem;
            font-weight: 750;
            letter-spacing: -.5px;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: var(--text-secondary);
            font-size: .94rem;
            line-height: 1.6;
            margin-bottom: 32px;
        }

        .form-label {
            font-size: .88rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .input-group-text {
            background: #f9fafc;
            border-color: #dce3ec;
            color: #7d8898;
            padding-left: 15px;
            padding-right: 15px;
        }

        .form-control {
            border-color: #dce3ec;
            min-height: 49px;
            font-size: .93rem;
        }

        .form-control:focus {
            border-color: #86b6f5;
            box-shadow: 0 0 0 .2rem rgba(23,105,224,.10);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .form-check-label {
            font-size: .87rem;
            color: #5d6876;
        }

        .btn-login {
            background: var(--primary);
            border: 1px solid var(--primary);
            color: white;
            min-height: 50px;
            border-radius: 9px;
            font-weight: 600;
            transition: .2s ease;
        }

        .btn-login:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 5px 14px rgba(23,105,224,.2);
        }

        .login-footer {
            margin-top: 35px;
            padding-top: 22px;
            border-top: 1px solid #edf0f4;
            color: #98a1ad;
            font-size: .76rem;
            text-align: center;
        }

        @media (max-width: 991.98px) {
            .login-brand {
                min-height: 300px;
                padding: 36px;
            }

            .brand-heading {
                font-size: 2rem;
            }

            .login-form-area {
                min-height: auto;
                padding: 45px 36px;
            }
        }

        @media (max-width: 767.98px) {
            .login-page {
                padding: 16px;
            }

            .login-container {
                border-radius: 15px;
            }

            .login-brand {
                min-height: auto;
                padding: 24px;
            }

            .login-brand .brand-main-message,
            .login-brand .brand-footer {
                display: none;
            }

            .brand-logo {
                width: 42px;
                height: 42px;
                font-size: 21px;
                margin-bottom: 10px;
            }

            .brand-name {
                font-size: 1.25rem;
            }

            .login-form-area {
                padding: 34px 25px;
            }

            .login-title {
                font-size: 1.65rem;
            }
        }

        .login-container .row {
            align-items: stretch;
        }

        .login-container .col-lg-5 {
            display: flex;
        }

        .login-brand {
            width: 100%;
            min-height: 100%;
        }

        @media (max-width: 991.98px) {
            .login-brand {
                min-height: 300px;
            }
        }

        @media (max-width: 767.98px) {
            .login-brand {
                min-height: auto;
            }
        }
    </style>
</head>

<body>

<main class="login-page">

    <div class="login-container">

        <div class="row g-0">

            {{-- PANEL DE IDENTIDAD CORPORATIVA --}}
            <div class="col-lg-5">

                <section class="login-brand">

                    <div class="brand-content">

                        <div class="brand-logo">
                            <i class="bi bi-capsule-pill"></i>
                        </div>

                        <div class="brand-name">
                            DISFARMA
                        </div>

                        <div class="brand-description">
                            Honduras
                        </div>

                    </div>

                    <div class="brand-content brand-main-message">

                        <h1 class="brand-heading">
                            Gestión que
                            impulsa la salud.
                        </h1>

                        <p class="brand-text">
                            Plataforma integral para la
                            administración farmacéutica,
                            gestión de inventarios,
                            proveedores y personal.
                        </p>

                    </div>

                    <div class="brand-content brand-footer">
                        SISTEMA INTEGRAL DE GESTIÓN
                    </div>

                </section>

            </div>


            {{-- FORMULARIO DE AUTENTICACIÓN --}}
            <div class="col-lg-7">

                <section class="login-form-area">

                    <span class="welcome-badge">
                        ACCESO INSTITUCIONAL
                    </span>

                    <h2 class="login-title">
                        Bienvenido nuevamente
                    </h2>

                    <p class="login-subtitle">
                        Ingresa tus credenciales para acceder
                        al sistema administrativo de DISFARMA.
                    </p>


                    <form
                        method="POST"
                        action="{{ route('login.post') }}">

                        @csrf


                        {{-- CORREO --}}
                        <div class="mb-4">

                            <label for="email" class="form-label">
                                Correo electrónico institucional
                            </label>

                            <div class="input-group has-validation">

                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autocomplete="username"
                                    placeholder="usuario@disfarma.hn"
                                    class="form-control @error('email') is-invalid @enderror"
                                    required>

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- CONTRASEÑA --}}
                        <div class="mb-3">

                            <label for="password" class="form-label">
                                Contraseña
                            </label>

                            <div class="input-group has-validation">

                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    autocomplete="current-password"
                                    placeholder="Ingresa tu contraseña"
                                    class="form-control @error('password') is-invalid @enderror"
                                    required>

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- RECORDAR SESIÓN --}}
                        <div class="form-check mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                value="1"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label
                                class="form-check-label"
                                for="remember">

                                Recordar mi sesión

                            </label>

                        </div>


                        {{-- BOTÓN DE ACCESO --}}
                        <button
                            type="submit"
                            class="btn btn-login w-100">

                            <i class="bi bi-box-arrow-in-right me-2"></i>

                            Iniciar sesión

                        </button>

                    </form>


                    <div class="login-footer">
                        Droguería y Distribuidora Farmacéutica
                        San Rafael S. de R.L.

                        <div class="mt-2">
                            © {{ date('Y') }} DISFARMA Honduras.
                        </div>
                        <div class="mt-2">
                            Jeser Aziel Amaya Ortiz - UNAH.
                        </div>
                    </div>

                </section>

            </div>

        </div>

    </div>

</main>

</body>
</html>
