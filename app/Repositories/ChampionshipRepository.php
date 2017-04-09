<?php

namespace App\Repositories;

use App\Model\Championship;

class ChampionshipRepository
{
    private $championship;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->championship = Championship::find($id);
        }
    }

    public function get()
    {
        return $this->championship;
    }

    public function create($data)
    {
        return Championship::create([
            'name' => $data['name']
        ]);
    }
}
