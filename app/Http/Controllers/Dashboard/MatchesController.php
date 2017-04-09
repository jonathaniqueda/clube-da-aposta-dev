<?php

namespace App\Http\Controllers\Dashboard;

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

    }

    public function create(Request $request)
    {

    }
}
