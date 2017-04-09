@extends('layouts.app')
@section('content')

    <div class="col-xs-12 col-sm-9 col-md-10 affix-content">
        <div class="container">

            <div class="page-header">
                <h3>
                    Remover Time do Campeonato
                </h3>
            </div>

            <div class="col-xs-12 col-md-6">
                <form class="general-ajax-with-redirect" role="form"
                      action="{{route('teams_remove_associated', ['id' => $team->id])}}"
                      id="formToClean">

                    <div class="form-group">
                        <label for="removeChamp">Selecionar Campeonato:</label>
                        <select class="form-control" name="championship_id">
                            @foreach($team->championship as $championship)
                                <option value="{{$championship->id}}">
                                    {{$championship->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success btn-process-ajax">Remover</button>
                </form>
            </div>

        </div>
    </div>

@endsection
