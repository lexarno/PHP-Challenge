<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Challenge</h5>
  @if (Route::has('login'))
    @auth
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ url('/home') }}">Home</a>
        </nav>
    @else
        <nav class="my-2 my-md-0 mr-md-3">
        @if (Route::has('register'))
            <a class="p-2 text-dark" href="{{ route('register') }}">Cadastre-se</a>
        @endif
        </nav>
        <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
    @endauth
  @endif
</div>