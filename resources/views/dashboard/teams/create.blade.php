@extends('layouts.app')
@section('content')

    <div class="col-xs-12 col-sm-9 col-md-10 affix-content">
        <div class="container">

            <div class="page-header">
                <h3>
                    Cadastrar Time
                </h3>
            </div>

            <div class="col-xs-12 col-md-6">
                <form class="general-ajax-without-redirect" role="form" action="{{route('teams_create')}}"
                      id="formToClean">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nome do time"
                               required>
                    </div>

                    <button type="submit" class="btn btn-success btn-process-ajax">Criar</button>
                </form>
            </div>

        </div>
    </div>

@endsection
