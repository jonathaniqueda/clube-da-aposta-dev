<?php

namespace App\Http\Controllers\Dashboard;

use App\Custom\Request\RequestMessage;
use App\Model\Championship;
use App\Model\Match;
use App\Repositories\MatchesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchesController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new MatchesRepository();
    }

    public function index(Request $request)
    {
        $matches = Match::paginate(10);

        return view('dashboard.match.index', ['matches' => $matches]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $all = $request->all();

            $validate = \Validator::make($all, [
                'championship_id' => 'required',
                'team_a_id' => 'required|invalid_team_selected',
                'team_b_id' => 'required',
                'team_a_goals' => 'required',
                'team_b_goals' => 'required',
                'match_day' => 'required',
            ]);

            if ($validate->fails()) {
                return RequestMessage::warning($validate->errors());
            }

            $this->repo->create($all);

            return RequestMessage::success(['msg' => 'Jogo cadastrado!']);
        }

        $championships = Championship::has('teams')->get();

        return view('dashboard.match.create', ['championships' => $championships]);
    }
}
