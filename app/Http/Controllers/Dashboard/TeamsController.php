<?php

namespace App\Http\Controllers\Dashboard;

use App\Custom\Request\RequestMessage;
use App\Model\Team;
use App\Repositories\TeamsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamsController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new TeamsRepository();
    }

    public function index(Request $request)
    {
        $teams = Team::paginate(10);

        return view('dashboard.teams.index', ['teams' => $teams]);
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

            return RequestMessage::success(['msg' => 'Time cadastrado!']);
        }

        return view('dashboard.teams.create');
    }
}
