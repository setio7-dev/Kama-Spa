<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kama Spa - Admin</title>
    <link rel="stylesheet" href="{{ asset('/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('/logo.jpg') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Jost', sans-serif;
            background: #0e0c09;
            color: #f0e6d0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .ks-layout {
            display: flex;
            min-height: 100vh;
            padding-top: 60px;
        }

        .ks-sidebar {
            width: 220px;
            min-width: 220px;
            background: rgba(255, 250, 244, 0.03);
            border-right: 1px solid rgba(210, 180, 130, 0.1);
            padding: 1.5rem 0;
            position: fixed;
            top: 60px;
            left: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 50;
            transition: transform 0.3s ease;
        }

        .ks-sidebar::-webkit-scrollbar { width: 4px; }
        .ks-sidebar::-webkit-scrollbar-track { background: transparent; }
        .ks-sidebar::-webkit-scrollbar-thumb { background: rgba(210,180,130,0.2); border-radius: 2px; }

        .ks-sidebar-nav {
            list-style: none;
            padding: 0 0.75rem;
        }

        .ks-nav-item {
            margin-bottom: 0.2rem;
        }

        .ks-nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.9rem;
            border-radius: 2px;
            text-decoration: none;
            font-size: 0.78rem;
            letter-spacing: 0.1em;
            font-weight: 400;
            color: rgba(210, 180, 130, 0.55);
            transition: background 0.2s, color 0.2s, border-color 0.2s;
            border: 1px solid transparent;
            position: relative;
        }

        .ks-nav-link:hover {
            color: #e8d5b0;
            background: rgba(210, 180, 130, 0.07);
        }

        .ks-nav-item.active > .ks-nav-link {
            color: #e8d5b0;
            background: rgba(210, 180, 130, 0.1);
            border-color: rgba(210, 180, 130, 0.22);
        }

        .ks-nav-icon {
            font-size: 1rem;
            width: 18px;
            text-align: center;
            flex-shrink: 0;
        }

        .ks-nav-title {
            flex: 1;
        }

        .ks-nav-arrow {
            font-size: 0.85rem;
            transition: transform 0.2s;
        }

        .ks-submenu {
            list-style: none;
            padding: 0.3rem 0 0.3rem 2.6rem;
            display: none;
        }

        .ks-submenu.open {
            display: block;
        }

        .has-submenu.active .ks-nav-arrow,
        .has-submenu .ks-nav-toggle.open .ks-nav-arrow {
            transform: rotate(180deg);
        }

        .ks-subnav-link {
            display: block;
            padding: 0.45rem 0.5rem;
            font-size: 0.74rem;
            letter-spacing: 0.08em;
            color: rgba(210, 180, 130, 0.45);
            text-decoration: none;
            border-left: 1px solid rgba(210, 180, 130, 0.12);
            transition: color 0.2s, border-color 0.2s;
        }

        .ks-subnav-link:hover,
        .ks-subnav-link.active {
            color: #e8d5b0;
            border-left-color: rgba(210, 180, 130, 0.5);
        }

        .ks-main {
            margin-left: 220px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: calc(100vh - 60px);
        }

        .ks-content {
            flex: 1;
            padding: 2rem;
            animation: fadeUp 0.5s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .ks-page-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.6rem;
            font-weight: 500;
            color: #e8d5b0;
            letter-spacing: 0.06em;
            margin-bottom: 1.5rem;
        }

        .ks-card {
            background: rgba(255, 250, 244, 0.04);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(210, 180, 130, 0.15);
            border-radius: 2px;
            margin-bottom: 1.5rem;
        }

        .ks-card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid rgba(210, 180, 130, 0.12);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 500;
            color: #e8d5b0;
            letter-spacing: 0.06em;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .ks-card-body {
            padding: 1.5rem;
        }

        .ks-card-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(210, 180, 130, 0.12);
        }

        .ks-stat-card {
            background: rgba(255, 250, 244, 0.04);
            border: 1px solid rgba(210, 180, 130, 0.15);
            border-radius: 2px;
            padding: 1.5rem;
            text-align: center;
            transition: background 0.25s, border-color 0.25s;
        }

        .ks-stat-card:hover {
            background: rgba(210, 180, 130, 0.06);
            border-color: rgba(210, 180, 130, 0.28);
        }

        .ks-stat-label {
            font-size: 0.7rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(210, 180, 130, 0.5);
            margin-bottom: 0.6rem;
        }

        .ks-stat-value {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 500;
            color: #e8d5b0;
            letter-spacing: 0.04em;
        }

        .ks-form-group {
            margin-bottom: 1.2rem;
        }

        .ks-label {
            display: block;
            font-size: 0.7rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(210, 180, 130, 0.6);
            margin-bottom: 0.45rem;
        }

        .ks-input,
        .ks-select,
        .ks-textarea {
            width: 100%;
            background: rgba(255, 250, 244, 0.05);
            border: 1px solid rgba(210, 180, 130, 0.2);
            border-radius: 1px;
            padding: 0.75rem 1rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.88rem;
            font-weight: 300;
            color: #f0e6d0;
            outline: none;
            transition: border-color 0.25s, background 0.25s;
            letter-spacing: 0.03em;
        }

        .ks-input::placeholder,
        .ks-textarea::placeholder {
            color: rgba(210, 180, 130, 0.25);
        }

        .ks-input:focus,
        .ks-select:focus,
        .ks-textarea:focus {
            border-color: rgba(210, 180, 130, 0.5);
            background: rgba(255, 250, 244, 0.08);
        }

        .ks-select option {
            background: #1a1510;
            color: #f0e6d0;
        }

        .ks-textarea { resize: vertical; min-height: 90px; }

        .ks-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.7rem 1.4rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.72rem;
            font-weight: 400;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            border-radius: 1px;
            cursor: pointer;
            transition: all 0.22s;
            border: 1px solid;
            text-decoration: none;
        }

        .ks-btn-primary {
            background: rgba(210, 180, 130, 0.12);
            border-color: rgba(210, 180, 130, 0.45);
            color: #e8d5b0;
        }

        .ks-btn-primary:hover {
            background: rgba(210, 180, 130, 0.22);
            border-color: rgba(210, 180, 130, 0.7);
            color: #f5ead4;
        }

        .ks-btn-danger {
            background: rgba(180, 60, 60, 0.15);
            border-color: rgba(180, 60, 60, 0.45);
            color: #f0c0c0;
        }

        .ks-btn-danger:hover {
            background: rgba(180, 60, 60, 0.28);
            border-color: rgba(180, 60, 60, 0.7);
        }

        .ks-btn-success {
            background: rgba(80, 160, 100, 0.15);
            border-color: rgba(80, 160, 100, 0.45);
            color: #b0e4bc;
        }

        .ks-btn-success:hover {
            background: rgba(80, 160, 100, 0.28);
            border-color: rgba(80, 160, 100, 0.7);
        }

        .ks-btn:active { transform: scale(0.98); }

        .ks-table-wrap {
            overflow-x: auto;
        }

        .ks-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.83rem;
        }

        .ks-table thead tr {
            border-bottom: 1px solid rgba(210, 180, 130, 0.2);
        }

        .ks-table th {
            padding: 0.7rem 1rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.65rem;
            font-weight: 400;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(210, 180, 130, 0.5);
            text-align: left;
            white-space: nowrap;
        }

        .ks-table td {
            padding: 0.85rem 1rem;
            color: rgba(240, 230, 208, 0.8);
            border-bottom: 1px solid rgba(210, 180, 130, 0.07);
            vertical-align: middle;
        }

        .ks-table tbody tr:hover td {
            background: rgba(210, 180, 130, 0.04);
        }

        .ks-badge {
            display: inline-block;
            padding: 0.22rem 0.65rem;
            font-size: 0.65rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            border-radius: 1px;
            font-family: 'Jost', sans-serif;
        }

        .ks-badge-success {
            background: rgba(80, 160, 100, 0.18);
            border: 1px solid rgba(80, 160, 100, 0.4);
            color: #b0e4bc;
        }

        .ks-badge-warning {
            background: rgba(200, 160, 60, 0.18);
            border: 1px solid rgba(200, 160, 60, 0.4);
            color: #f0d898;
        }

        .ks-badge-danger {
            background: rgba(180, 60, 60, 0.18);
            border: 1px solid rgba(180, 60, 60, 0.4);
            color: #f0c0c0;
        }

        .ks-divider {
            height: 1px;
            background: rgba(210, 180, 130, 0.12);
            margin: 1.5rem 0;
        }

        .ks-tab-group {
            display: flex;
            gap: 0;
            border-bottom: 1px solid rgba(210, 180, 130, 0.15);
            margin-bottom: 1.5rem;
        }

        .ks-tab {
            padding: 0.6rem 1.2rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.72rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(210, 180, 130, 0.45);
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: color 0.2s, border-color 0.2s;
            margin-bottom: -1px;
        }

        .ks-tab:hover { color: #e8d5b0; }

        .ks-tab.active {
            color: #e8d5b0;
            border-bottom-color: rgba(210, 180, 130, 0.6);
        }

        .ks-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(10, 8, 5, 0.75);
            backdrop-filter: blur(4px);
            z-index: 300;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .ks-modal-overlay.open { display: flex; }

        .ks-modal {
            background: #141108;
            border: 1px solid rgba(210, 180, 130, 0.2);
            border-radius: 2px;
            width: 100%;
            max-width: 460px;
            animation: fadeUp 0.3s ease both;
        }

        .ks-modal-header {
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid rgba(210, 180, 130, 0.12);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            color: #e8d5b0;
        }

        .ks-modal-close {
            background: transparent;
            border: none;
            color: rgba(210, 180, 130, 0.5);
            font-size: 1.2rem;
            cursor: pointer;
            transition: color 0.2s;
        }

        .ks-modal-close:hover { color: #e8d5b0; }

        .ks-modal-body { padding: 1.5rem; }

        .ks-modal-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(210, 180, 130, 0.12);
            display: flex;
            gap: 0.75rem;
            justify-content: flex-end;
        }

        .ks-file-upload-wrap {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .ks-file-upload-info {
            flex: 1;
        }

        .ks-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.2rem;
        }

        .ks-grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.2rem;
        }

        @media (max-width: 900px) {
            .ks-grid-4 { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 600px) {
            .ks-grid-2, .ks-grid-4 { grid-template-columns: 1fr; }
            .ks-sidebar { transform: translateX(-100%); }
            .ks-sidebar.open { transform: translateX(0); }
            .ks-main { margin-left: 0; }
        }
    </style>
</head>
<body>
    @include('components.navbar')
    <div class="ks-layout">
        @include('components.admin.sidebar')
        <div class="ks-main">
            <div class="ks-content">
                @yield('dashboard')
            </div>
            @include('components.footer')
        </div>
    </div>

    <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('/assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function toggleSubmenu(link, e) {
            e.preventDefault();
            const submenu = link.nextElementSibling;
            if (submenu && submenu.classList.contains('ks-submenu')) {
                submenu.classList.toggle('open');
            }
        }
    </script>

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
                background: '#141108',
                color: '#e8d5b0',
                didOpen: () => { Swal.showLoading(); }
            });

            await new Promise(resolve => setTimeout(resolve, 2000));

            Swal.fire({
                title: message,
                icon: icon,
                confirmButtonText: "Oke",
                background: '#141108',
                color: '#e8d5b0',
                confirmButtonColor: icon === "success" ? '#4a9060' : '#b43c3c'
            });

            await new Promise(resolve => setTimeout(resolve, 2000));
            window.location.href = route;
        })();
    </script>
    @endif

    <script>
        $(document).on('click', '.file-upload-browse', function() {
            var file = $(this).parents().find('.file-upload-default');
            file.trigger('click');
        });
        $('.file-upload-default').on('change', function() {
            $(this).parent().find('.file-upload-info').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    </script>
</body>
</html>