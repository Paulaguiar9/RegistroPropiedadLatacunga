@extends('auth.app')

@section('content')

    <div class="text-size-22 font-weight-normal">Se te olvidó tu contraseña</div>
    <div class="mt-15">
        Por favor ingrese dirección de correo electrónico. Recibirá un enlace para crear una nueva contraseña por correo electrónico.
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="mt-2">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

            <div class="col-md-8">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Enviar contraseña Restablecer enlace') }}
                </button>
                
                <a class="btn btn-link btn-block" href="{{ route('login') }}">
                    {{ __('Ingresar') }}
                </a>
            </div>
        </div>
    </form>

@endsection
