@extends('layouts.app')
@section('content')

    <div class="col-xs-12 col-sm-9 col-md-10 affix-content">
        <div class="container">

            <div class="page-header">
                <h3>Times
                    <a href="{{route('teams_create')}}" class="btn btn-success pull-right">Cadastrar Novo</a>
                </h3>
            </div>

            @if(!$teams->isEmpty())
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Editar Campeonatos Associados</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{$team->id}}</td>
                            <td>{{$team->name}}</td>
                            <td>
                                @if(!$team->championship->isEmpty())
                                    <a href="{{route('teams_remove_associated', ['id' => $team->id])}}">
                                        <span class="fa fa-edit fa-2x"></span>
                                    </a>
                                @else
                                    O {{$team->name}} não está em nenhum campeonato
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @include('layouts.paginator', ['paginator' => $teams])
            @else
                <h4>Nenhum time foi cadastrado ainda. <a href="{{route('teams_create')}}">Clique aqui</a>
                    para cadastrar um novo time.
                </h4>
            @endif

        </div>
    </div>

@endsection
