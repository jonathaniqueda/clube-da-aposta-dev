@extends('layouts.app')
@section('content')

    <div class="col-xs-12 col-sm-9 col-md-10 affix-content">
        <div class="container">

            <div class="page-header">
                <h3>Seja bem-vindo, {{\Auth::user()->name}}!</h3>
            </div>

            <p>Esse painel foi criado para você gerenciar os seus campeonatos, jogos e posição de cada time em cada
                campeonato.</p>

        </div>
    </div>

@endsection
