<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Challenge</h5>
  @if (Route::has('login'))
    @auth
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"">{{ Auth::user()->name }} (Sair)</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </nav>
    @else
        <nav class="my-2 my-md-0 mr-md-3">
        @if (Route::has('register'))
            <a class="p-2 text-dark" href="{{ route('user.index') }}">Cadastre-se</a>
        @endif
        </nav>
        <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
    @endauth
  @endif
</div>
