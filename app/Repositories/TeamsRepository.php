<?php

namespace App\Repositories;

use App\Model\Team;

class TeamsRepository
{
    private $team;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->team = Team::find($id);
        }
    }

    public function get()
    {
        return $this->team;
    }

    public function create($data)
    {
        return Team::create([
            'name' => $data['name']
        ]);
    }
}
