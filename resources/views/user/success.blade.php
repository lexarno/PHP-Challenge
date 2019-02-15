@extends('layouts.challenge')

@section('title')
    <title>Parabéns - PHP Challenge</title>
@endsection

@section('titleog')
    <meta property="og:title" content="Parabéns - PHP Challenge" />
@endsection

@section('urlog')
    <meta property="og:url" content="{{ route('user.success') }}"/>
@endsection

@section('description')
    <meta name="description" content="Parabéns, seu cadastro foi concluído com sucesso." />
@endsection

@section('descriptionog')
    <meta property="og:description" content="Parabéns, seu cadastro foi concluído com sucesso." />
@endsection

@section('canonical')
    <link href="{{ route('user.success') }}" rel="canonical" />
@endsection

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Parabéns!</h1>
        <p class="lead">Seu cadastro foi concluído com sucesso!</p>
    </div>

@endsection