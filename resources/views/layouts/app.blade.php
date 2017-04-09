<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jonathan Iqueda">
    <meta name="description" content="Teste de dev para o Clube da Aposta">
    <link rel="shortcut icon"
          href="http://www.clubedaposta.com/novo-site/wp-content/themes/clubedaposta/images/cache/f59477ec0d15ed128c30bdd59d37dad2.png"
          type="image/x-icon"/>


    <title>{{ config('app.name') }}</title>

    <link href="{{ elixir('/css/app.css') }}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token()
            ]) !!}
    </script>
</head>

<body>

<div class="row affix-row">

    @include('layouts.header')
    @yield('content')

</div>

<script src="{{ elixir('/js/app.js') }}"></script>
</body>
</html>
