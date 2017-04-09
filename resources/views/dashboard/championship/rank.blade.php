@extends('layouts.app')
@section('content')

    <div class="col-xs-12 col-sm-9 col-md-10 affix-content">
        <div class="container">

            <div class="page-header">
                <h3>
                    Cadastrar Jogo
                </h3>
            </div>

            @if(!$championships->isEmpty())
                <div class="col-xs-12 col-md-6">
                    <form class="general-ajax-with-redirect trigger-rank" role="form" action="{{route('championship_rank')}}"
                          id="formToClean">

                        <div class="form-group">
                            <label for="filterChamp">Selecionar o Campeonato:</label>
                            <select class="form-control" id="filterChamp" name="championship_id">
                                @foreach($championships as $championship)
                                    <option value="{{$championship->id}}"
                                            @if($championship->id == session('current_champs')) selected @endif>
                                        {{$championship->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-process-ajax">
                                Gerar Classificação
                            </button>
                        </div>
                    </form>
                </div>

                @if(!empty($results))
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Posição no Campeonato</th>
                            <th>Time</th>
                            <th>Pontuação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $count = 1; @endphp
                        @foreach($results as $teamId => $result)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{\App\Model\Team::find($teamId)->name}}</td>
                                <td>{{$result}}</td>
                            </tr>
                            @php $count++; @endphp
                        @endforeach
                        </tbody>
                    </table>
                @endif

            @else
                <div class="col-xs-12">
                    <h3>Nenhum campeonato possui time associado. Por favor, <a href="{{route('teams_associated')}}">associe
                            um time a um
                            campeonato</a> antes.</h3>
                </div>
            @endif

        </div>
    </div>

@endsection
