<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('/logo.jpg') }}">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Jost', sans-serif;
            background: #0e0c09;
            overflow: hidden;
        }

        .bg-image {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.35;
            z-index: 0;
            filter: saturate(0.6);
        }

        .bg-overlay {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, rgba(14,12,9,0.75) 0%, rgba(30,22,14,0.55) 100%);
            z-index: 1;
        }

        .login-wrapper {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 2rem 1rem;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 250, 244, 0.04);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(210, 180, 130, 0.18);
            border-radius: 2px;
            padding: 3rem 2.5rem;
            animation: fadeUp 0.7s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2.5rem;
        }

        .brand-logo-wrap {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            overflow: hidden;
            border: 1px solid rgba(210, 180, 130, 0.3);
            margin-bottom: 1rem;
        }

        .brand-logo-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .brand-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 500;
            color: #e8d5b0;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .brand-tagline {
            font-size: 0.72rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: rgba(210, 180, 130, 0.55);
            margin-top: 0.3rem;
        }

        .divider {
            width: 40px;
            height: 1px;
            background: rgba(210, 180, 130, 0.3);
            margin: 1.5rem auto;
        }

        .form-heading {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-heading h4 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.35rem;
            font-weight: 400;
            color: #f0e6d0;
            letter-spacing: 0.04em;
        }

        .form-heading p {
            font-size: 0.8rem;
            color: rgba(210, 180, 130, 0.5);
            margin-top: 0.3rem;
            letter-spacing: 0.08em;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            font-size: 0.7rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(210, 180, 130, 0.6);
            margin-bottom: 0.5rem;
        }

        .form-control-custom {
            width: 100%;
            background: rgba(255, 250, 244, 0.05);
            border: 1px solid rgba(210, 180, 130, 0.2);
            border-radius: 1px;
            padding: 0.85rem 1rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.9rem;
            font-weight: 300;
            color: #f0e6d0;
            outline: none;
            transition: border-color 0.25s, background 0.25s;
            letter-spacing: 0.04em;
        }

        .form-control-custom::placeholder {
            color: rgba(210, 180, 130, 0.25);
        }

        .form-control-custom:focus {
            border-color: rgba(210, 180, 130, 0.55);
            background: rgba(255, 250, 244, 0.08);
        }

        .btn-login {
            width: 100%;
            margin-top: 1.5rem;
            padding: 0.9rem;
            background: rgba(210, 180, 130, 0.12);
            border: 1px solid rgba(210, 180, 130, 0.45);
            border-radius: 1px;
            font-family: 'Jost', sans-serif;
            font-size: 0.75rem;
            font-weight: 400;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: #e8d5b0;
            cursor: pointer;
            transition: background 0.25s, border-color 0.25s, color 0.25s;
        }

        .btn-login:hover {
            background: rgba(210, 180, 130, 0.22);
            border-color: rgba(210, 180, 130, 0.7);
            color: #f5ead4;
        }

        .btn-login:active {
            transform: scale(0.99);
        }
    </style>
</head>

<body>
    <img src="{{ asset('/image/auth.jpg') }}" class="bg-image" alt="">
    <div class="bg-overlay"></div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="brand">
                <div class="brand-logo-wrap">
                    <img src="{{ asset('/logo.jpg') }}" alt="Kama Spa">
                </div>
                <span class="brand-name">Kama Spa</span>
                <span class="brand-tagline">Wellness &amp; Serenity</span>
            </div>

            <div class="divider"></div>

            <div class="form-heading">
                <h4>Selamat Datang</h4>
                <p>Masuk untuk melanjutkan</p>
            </div>

            <form action="{{ route('loginPost') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="form-control-custom"
                        placeholder="nama@email.com"
                        required
                    >
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="form-control-custom"
                        placeholder="••••••••"
                        required
                    >
                </div>
                <button type="submit" class="btn-login">Masuk</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/assets/js/template.js') }}"></script>
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
    <script src="{{ asset('/assets/js/todolist.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('message'))
    <script>
        (async () => {
            const route = "{{ session('route') }}";
            const message = "{{ session('message') }}";
            const icon = "{{ session('icon') }}";

            Swal.fire({
                title: "Memuat...",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => { Swal.showLoading(); }
            });

            await new Promise(resolve => setTimeout(resolve, 2000));

            Swal.fire({
                title: message,
                icon: icon,
                confirmButtonText: "Oke",
                confirmButtonColor: icon === "success" ? "green" : "red"
            });

            await new Promise(resolve => setTimeout(resolve, 2000));
            window.location.href = route;
        })();
    </script>
    @endif
</body>
</html>