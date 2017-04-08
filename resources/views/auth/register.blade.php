@extends('layouts.app-login')
@section('content')

    <div>
        <h4>Dev Test - Clube da Aposta</h4>
    </div>

    <p>Crie sua conta</p>

    <a class="btn btn-block btn-social btn-facebook" href="{{route('login_facebook')}}">
        <i class="fa fa-facebook"></i>
        Entrar com Facebook
    </a>

    <form class="m-t general-ajax-with-redirect" role="form" action="{{route('login_create')}}">

        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nome" required="">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-mail" required="">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Senha" required="">
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme sua senha"
                   required="">
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b btn-process-ajax">Criar</button>

        <p class="text-muted text-center">
            <small>Já tem uma conta?</small>
        </p>
        <a class="btn btn-sm btn-white btn-block" href="{{route('login_index')}}">Entrar</a>

    </form>

@endsection
