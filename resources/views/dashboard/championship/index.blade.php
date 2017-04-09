@extends('layouts.app')
@section('content')

    <div class="col-xs-12 col-sm-9 col-md-10 affix-content">
        <div class="container">

            <div class="page-header">
                <h3>Campeonatos
                    <a href="{{route('championship_create')}}" class="btn btn-success pull-right">Cadastrar Novo</a>
                </h3>
            </div>

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

        </div>
    </div>

@endsection
