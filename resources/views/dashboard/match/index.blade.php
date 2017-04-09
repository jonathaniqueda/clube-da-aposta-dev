@extends('layouts.app')
@section('content')

    <div class="col-xs-12 col-sm-9 col-md-10 affix-content">
        <div class="container">

            <div class="page-header">
                <h3>
                    Jogos
                    <a href="{{route('matches_create')}}" class="btn btn-success pull-right">Cadastrar Novo</a>
                </h3>
            </div>

            @if(!$matches->isEmpty())
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Time da Casa</th>
                        <th>Time de Fora</th>
                        <th>Resultado</th>
                        <th>Dia da Partida</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($matches as $match)
                        <tr>
                            <td>{{$match->id}}</td>
                            <td>{{$match->teamA->name}}</td>
                            <td>{{$match->teamB->name}}</td>
                            <td>{{$match->result_formated}}</td>
                            <td>{{$match->match_day}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @include('layouts.paginator', ['paginator' => $matches])
            @else
                <h4>Nenhum jogo foi cadastrado ainda. <a href="{{route('matches_create')}}">Clique aqui</a>
                    para cadastrar um novo jogo.
                </h4>
            @endif

        </div>
    </div>

@endsection
