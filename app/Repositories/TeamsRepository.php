<?php

namespace App\Repositories;

use App\Model\Teams;

class TeamsRepository
{
    private $team;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->team = Teams::find($id);
        }
    }

    public function get()
    {
        return $this->team;
    }
}
