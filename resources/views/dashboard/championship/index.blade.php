@extends('layouts.app')
@section('content')

    <div class="col-xs-12 col-sm-9 col-md-10 affix-content">
        <div class="container">

            <div class="page-header">
                <h3>Campeonatos
                    <a href="{{route('championship_create')}}" class="btn btn-success pull-right">Cadastrar Novo</a>
                </h3>
            </div>

            @if(!$championships->isEmpty())
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($championships as $championship)
                        <tr>
                            <td>{{$championship->id}}</td>
                            <td>{{$championship->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @include('layouts.paginator', ['paginator' => $championships])
            @else
                <h4>Nenhum campeonato foi cadastrado ainda. <a href="{{route('championship_create')}}">Clique aqui</a>
                    para cadastrar um novo campeonato.
                </h4>
            @endif

        </div>
    </div>

@endsection
