@extends('layouts.app-login')
@section('content')

    <div>
        <h4>Dev Test - Clube da Aposta</h4>
    </div>

    <p>Cadastrar senha</p>

    <form class="m-t general-ajax-with-redirect" role="form" action="{{route('login_create_pass')}}">

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Senha" required="">
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme sua senha"
                   required="">
        </div>
        
        <button type="submit" class="btn btn-primary block full-width m-b btn-process-ajax">Cadastrar</button>

    </form>

@endsection
