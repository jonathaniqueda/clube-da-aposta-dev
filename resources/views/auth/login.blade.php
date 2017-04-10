@extends('layouts.app-login')
@section('content')

    <div>
        <h4>Dev Test - Clube da Aposta</h4>
    </div>
    <form class="m-t general-ajax-with-redirect" role="form" action="{{route('login_index')}}">

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-mail" required="">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Senha" required="">
        </div>

        <button type="submit" class="btn btn-primary block full-width m-b btn-process-ajax">Entrar</button>

        <p class="text-muted text-center">
            <small>Não tem uma conta?</small>
        </p>
        <a class="btn btn-sm btn-white btn-block" href="{{route('login_create')}}">Clique aqui e cadastre-se</a>
    </form>

@endsection