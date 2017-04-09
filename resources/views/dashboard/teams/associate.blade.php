@extends('layouts.app')
@section('content')

    <div class="col-xs-12 col-sm-9 col-md-10 affix-content">
        <div class="container">

            <div class="page-header">
                <h3>
                    Associar Time a Campeonato
                </h3>
            </div>

            <div class="col-xs-12 col-md-6">
                <form class="general-ajax-without-redirect" role="form" action="{{route('teams_associated')}}"
                      id="formToClean">

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group">
                                <div class="imaginary_container" id="appendTeam">
                                    <label>Buscar Time:</label>
                                    <div class="input-group stylish-input-group">
                                        <input type="text" class="form-control" id="searchTeam"
                                               placeholder="Digite o nome do time para buscar" name="team">
                                            <span class="input-group-addon">
                                                <button class="search-btn"
                                                        data-route="{{route('elastic_search')}}"
                                                        data-model="Team">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group">
                                <div class="imaginary_container" id="appendChampionship">
                                    <label>Buscar Campeonato:</label>
                                    <div class="input-group stylish-input-group">
                                        <input type="text" class="form-control" id="searchChampionship"
                                               placeholder="Digite o nome do campeonato para buscar"
                                               name="championship">
                                            <span class="input-group-addon">
                                                <button class="search-btn"
                                                        data-route="{{route('elastic_search')}}"
                                                        data-model="Championship">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-process-ajax">Associar</button>
                </form>
            </div>

        </div>
    </div>

@endsection
