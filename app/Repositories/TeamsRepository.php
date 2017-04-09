<?php

namespace App\Repositories;

use App\Model\Championship;
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

    public function associate($data)
    {
        $team = Team::where('name', $data['team'])->first();

        if (empty($team)) {
            return 'Nenhum time foi encontrado com esse nome';
        }

        $champ = Championship::where('name', $data['championship'])->first();

        if (empty($champ)) {
            return 'Nenhum campeonato foi encontrado com esse nome';
        }

        if (!$team->championship->contains($champ->id)) {
            $team->championship()->save($champ);
        }

        return true;
    }

    public function detachChamp($data, $id)
    {
        $team = Team::find($id);
        $team->championship()->detach($data['championship_id']);

        return true;

    }
}
