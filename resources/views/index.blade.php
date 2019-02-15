@extends('layouts.challenge')

@section('title')
    <title>PHP Challenge</title>
@endsection

@section('titleog')
    <meta property="og:title" content="PHP Challenge" />
@endsection

@section('urlog')
    <meta property="og:url" content="{{ env('APP_URL') }}"/>
@endsection

@section('description')
    <meta name="description" content="Cadastre-se agora mesmo e garanta um plano de assinatura especial." />
@endsection

@section('descriptionog')
    <meta property="og:description" content="Cadastre-se agora mesmo e garanta um plano de assinatura especial." />
@endsection

@section('canonical')
    <link href="{{ env('APP_URL') }}" rel="canonical" />
@endsection

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Seja Bem Vindo(a)</h1>
        <p class="lead">Cadastre-se agora mesmo em nossa plataforma e desfrute dos melhores recursos.</p>
    </div>

@endsection