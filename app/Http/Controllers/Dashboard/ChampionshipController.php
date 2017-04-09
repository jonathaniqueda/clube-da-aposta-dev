<?php

namespace App\Http\Controllers\Dashboard;

use App\Custom\Request\RequestMessage;
use App\Model\Championship;
use App\Repositories\ChampionshipRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChampionshipController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new ChampionshipRepository();
    }

    public function index(Request $request)
    {
        $championships = Championship::paginate(10);

        return view('dashboard.championship.index', ['championships' => $championships]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $all = $request->all();

            $validate = \Validator::make($all, [
                'name' => 'required',
            ]);

            if ($validate->fails()) {
                return RequestMessage::warning($validate->errors());
            }

            $this->repo->create($all);

            return RequestMessage::success(['msg' => 'Campeonato cadastrado!']);
        }

        return view('dashboard.championship.create');
    }
}
