
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('title')
    @yield('titleog')
    @yield('urlog')
    @yield('description')
    @yield('descriptionog')

    @yield('canonical')
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ env('APP_URL') }}css/style.min.css?_={{ env('APP_TIMECACHE') }}">

  </head>
  <body class="bg-light">