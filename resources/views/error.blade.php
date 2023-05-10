<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="{{asset('admin/js/app.js')}}"></script>
        <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
        <title>StackBox</title>
    </head>
    <body>
        <div class="error-wrapper d-flex align-items-center justify-content-center">
            <div class="error-box text-center fadeInDown animated">
                <div class="text-size-16">Looks like you are lost!</div>
                <div class="code-text mt-10 font-weight-normal">404</div>
                <div class="text-size-16 mt-10">If yuo end up hree, prehpas yuo are tpying it worngly. Let us get you back on track</div>
                <a href="{{route('home')}}" class="btn btn-primary w-50 mt-50 py-13">Go back to dashboard</a>
            </div>
        </div>
    </body>
</html>