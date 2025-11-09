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
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('/logo.jpg') }}">
</head>

<body>
    <div class="container-scroller">
        @include('components.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('components.accounting.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('dashboard')
                </div>
                @include('components.footer')
            </div>                
        </div>
    </div>
</body>
<script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('/assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('/assets/js/template.js') }}"></script>
<script src="{{ asset('/assets/js/settings.js') }}"></script>
<script src="{{ asset('/assets/js/todolist.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/dashboard.js') }}"></script>

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
            didOpen: () => {
                Swal.showLoading();
            },
        });

        await new Promise((resolve) => setTimeout(resolve, 2000));
        Swal.fire({
            title: message,
            icon: icon,
            confirmButtonText: "Oke",
            confirmButtonColor: `${icon === "success" ? 'green' : 'red'}`
        });

        await new Promise((resolve) => setTimeout(resolve, 2000));
        window.location.href = route;
    })();
</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.5.3/js/fileinput.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.5.3/css/fileinput.min.css" rel="stylesheet">
<script>
    $(document).on('click', '.file-upload-browse', function() {
      var file = $(this).parents().find('.file-upload-default');
      file.trigger('click');
    });
    
    $('.file-upload-default').on('change', function() {
      $(this).parent().find('.file-upload-info').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
</script>

</html>