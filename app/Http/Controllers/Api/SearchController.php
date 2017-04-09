<?php

namespace App\Http\Controllers\Api;

use App\Custom\Request\RequestMessage;
use App\Model\Championship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function find(Request $request)
    {
        $all = $request->all();
        $model = 'App\\Model\\' . $all['model'];

        $results = $model::select('id', 'name')->where('name', 'like', '%' . $all['query'] . '%')->get();

        if ($results->isEmpty()) {
            return RequestMessage::success(['msg' => 'Nenhuma sugestão encontrada. Tente outro filtro.']);
        }

        return $results->toJson();
    }

    public function getTeamsByChamp($champsId)
    {
        return Championship::find($champsId)->teams->toJson();
    }
}
