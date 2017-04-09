<?php

namespace App\Repositories;

use App\Model\Match;

class MatchesRepository
{
    private $match;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->match = Match::find($id);
        }
    }

    public function get()
    {
        return $this->match;
    }
}
