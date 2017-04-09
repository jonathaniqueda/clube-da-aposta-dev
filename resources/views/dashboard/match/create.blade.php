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
                    <form class="general-ajax-without-redirect" role="form" action="{{route('matches_create')}}"
                          id="formToClean">

                        <div class="form-group">
                            <label for="removeChamp">Selecionar o Campeonato:</label>
                            <select class="form-control" id="findTeams" name="championship_id">
                                @foreach($championships as $championship)
                                    <option value="{{$championship->id}}"
                                            data-route="{{route('get_team_by_champs', ['champsId' => $championship->id])}}">
                                        {{$championship->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group to-show-after-team" style="display: none;">
                            <label for="removeChamp">Selecionar o time da casa:</label>
                            <select class="form-control" id="teamsA" name="team_a_id">

                            </select>
                        </div>

                        <div class="form-group to-show-after-team" style="display: none;">
                            <label for="removeChamp">Selecionar o time de fora:</label>
                            <select class="form-control" id="teamsB" name="team_b_id">

                            </select>
                        </div>

                        <div class="form-inline to-show-after-team" style="display: none;">
                            <label>Resultado do jogo:</label>

                            <div class="col-xs-12">

                                <div class="correct_field">
                                    <select name="team_a_goals" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="6">7</option>
                                        <option value="6">8</option>
                                        <option value="6">9</option>
                                        <option value="6">10</option>
                                    </select>
                                </div>

                                <div class="correct_versus">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </div>

                                <div class="correct_field">
                                    <select name="team_b_goals" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="6">7</option>
                                        <option value="6">8</option>
                                        <option value="6">9</option>
                                        <option value="6">10</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="form-group to-show-after-team" style="display: none;">
                            <label for="removeChamp">Dia do Jogo:</label>
                            <input type="text" name="match_day" class="form-control datepicker">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-process-ajax">Criar</button>
                        </div>
                    </form>
                </div>
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
