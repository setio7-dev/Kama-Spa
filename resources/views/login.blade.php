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
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('/logo.jpg') }}">
    </head>

    <style>
      .bg-image {
        position: fixed;
        z-index: 0;
        width: 100vw;
        height: 100vh;
        object-fit: cover;
        z-index: -1;
      }
    </style>

    <body>
       <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper" >
          <div class="d-flex align-items-center auth px-0">
            <img src="{{ asset('/image/auth.jpg') }}" class="bg-image"/>
            <div class="row w-100 mx-0">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius: 6px;">
                  <div class="brand-logo">
                    <img src="{{ asset('/logo.jpg') }}" class="w-25" alt="logo">
                    <h3 class="text-primary">Kama Spa</h3>
                  </div>
                  <h4>Halo! mari kita mulai</h4>
                  <h6 class="font-weight-light">Masuk untuk melanjutkan.</h6>
                  <form class="pt-3" action="{{ route('loginPost') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Kata Sandi">
                    </div>
                    <div class="mt-3 d-grid gap-2">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>
                    </div>                                   
                    <div class="text-center mt-4 font-weight-light">Belum punya akun? <a href="register.html" class="text-primary">Daftar</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>

    <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/assets/js/template.js') }}"></script>
    <script src="{{ asset('/assets/js/settings.js') }}"></script>
    <script src="{{ asset('/assets/js/todolist.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('message'))
        <script>    
        (async() => {
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
</html>
