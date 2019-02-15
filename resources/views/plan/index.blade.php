@extends('layouts.challenge')

@section('title')
    <title>Planos - PHP Challenge</title>
@endsection

@section('titleog')
    <meta property="og:title" content="Planos - PHP Challenge" />
@endsection

@section('urlog')
    <meta property="og:url" content="{{ route('user.plans') }}"/>
@endsection

@section('description')
    <meta name="description" content="Escolha seu plano e desfrute todos os recursos disponíveis." />
@endsection

@section('descriptionog')
    <meta property="og:description" content="Escolha seu plano e desfrute todos os recursos disponíveis." />
@endsection

@section('canonical')
    <link href="{{ route('user.plans') }}" rel="canonical" />
@endsection

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Planos</h1>
        <p class="lead">Escolha o plano que melhor se encaixa com suas necessidades.</p>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto border-top">
        <h3>{{ $user->name }}</h3>
        <p class="lead">E-mail: {{ $user->email }}</p>
        <p class="lead">Endereço: {{ $user->address }} {{ isset($user->number) ? ', '.$user->number : '' }}</p>
        <p class="lead">Bairro: {{ $user->district }} - {{ $user->city }} / {{ $user->uf }}</p>
        <p class="lead">CEP: {{ $user->cep }}</p>
    </div>

    <form method="POST" action="{{ route('payments.checkout') }}" id="frm-payment">
        @csrf

        <div class="card-deck mb-3 text-center">
            @if($plans->count() > 0)
                @foreach($plans as $plan)
                    <div class="card mb-4 shadow-sm cursor">
                        <label for="plan{{ $plan->id }}">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">{{ $plan->name }}</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">R$ {{ $plan->amount }} <small class="text-muted">/ mês</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>{{ $plan->description }}</li>
                                </ul>
                                <input class="form-check-input" type="radio" name="plan_id" id="plan{{ $plan->id }}" value="{{ $plan->id }}">
                                <br />
                            </div>
                        </label>
                    </div>
                @endforeach
            @endif
        </div>

        <hr class="mb-4">

        <h4 class="mb-3">Pagamento</h4>
    
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="card_name">Nome Completo</label>
                <input type="text" class="form-control" name="card_name" id="card_name" placeholder="" required>
                <small class="text-muted">Nome impresso no cartão *</small>
            </div>
            <div class="col-md-6 mb-3">
                <label for="card_number">Número do Cartão</label>
                <input type="text" class="form-control" name="card_number" id="card_number" placeholder="" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="card_expiration">Expiração</label>
                <input type="text" class="form-control" name="card_expiration" id="card_expiration" placeholder="" required>
            </div>
            <div class="col-md-3 mb-3">
                <label for="card_cvv">Código de Segurança</label>
                <input type="text" class="form-control" name="card_cvv" id="card_cvv" placeholder="" required>
            </div>
        </div>
        <hr class="mb-4">
        <input type="hidden" value="{{ $user->id }}" name="user_id" />
        <button class="btn btn-primary btn-lg btn-block" id="btnSavePayment" type="submit">Finalizar</button>
    </form>

@endsection

@section('scripts')    
    <script src="{{ env('APP_URL') }}js/bundle.min.js?_={{ env('APP_TIMECACHE') }}"></script>
    <script src="{{ env('APP_URL') }}js/actions/payment.js?_={{ env('APP_TIMECACHE') }}"></script>
@endsection