<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="{{asset('admin/js/app.js')}}"></script>
        <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
        <title>Iniciar Sesión</title>
    </head>
    <body>
        <div class="auth-wrapper d-flex align-items-center justify-content-center">
            <div class="auth-box bg-white shadow-sm p-30 pt-50 rounded text-center fadeInDown animated">
                <a href="{{url('/')}}">
                    <img class="fw-65" src="{{asset('img/logo.jpeg')}}" alt="Generic placeholder image">
                </a>
                
                 @yield('content')
            </div>
        </div>
    </body>
</html>