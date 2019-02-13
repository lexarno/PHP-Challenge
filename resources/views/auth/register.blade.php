@extends('layouts.challenge')

@section('title')
    <title>Cadastro - PHP Challenge</title>
@endsection

@section('titleog')
    <meta property="og:title" content="Cadastro - PHP Challenge" />
@endsection

@section('urlog')
    <meta property="og:url" content="{{ route('register') }}"/>
@endsection

@section('description')
    <meta name="description" content="Preencha o formulário de cadastro e crie sua conta." />
@endsection

@section('descriptionog')
    <meta property="og:description" content="Preencha o formulário de cadastro e crie sua conta." />
@endsection

@section('canonical')
    <link href="{{ route('register') }}" rel="canonical" />
@endsection

@section('content')
        
    <div class="col-md-10">
        <h1 class="display-4 text-center">Cadastro</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                <div class="col-md-6">
                    <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" required>

                    @if ($errors->has('cpf'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme a senha') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                <div class="col-md-6">
                    <input id="cep" type="text" class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}" name="cep" value="{{ old('cep') }}" required>

                    @if ($errors->has('cep'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cep') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="complement" class="col-md-4 col-form-label text-md-right">{{ __('Complemento') }}</label>

                <div class="col-md-6">
                    <input id="complement" type="text" class="form-control{{ $errors->has('complement') ? ' is-invalid' : '' }}" name="complement" value="{{ old('complement') }}" required>

                    @if ($errors->has('complement'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('complement') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>

                <div class="col-md-6">
                    <input id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ old('number') }}" required>

                    @if ($errors->has('number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>

                <div class="col-md-6">
                    <input id="district" type="text" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" name="cep" value="{{ old('district') }}" required>

                    @if ($errors->has('district'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('district') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

