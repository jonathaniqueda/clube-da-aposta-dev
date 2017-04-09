<?php

namespace App\Http\Controllers\Dashboard;

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

    }

    public function create(Request $request)
    {

    }
}
