<?php

namespace App\Repositories;

use App\Model\Championship;
use Illuminate\Database\Eloquent\Builder;

class ChampionshipRepository
{
    private $championship;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->championship = Championship::find($id);
        }
    }

    /**
     * Method to return the instance of Championship.
     *
     * @return Championship
     */
    public function get()
    {
        return $this->championship;
    }

    /**
     * Method to create the instance of Championship.
     *
     * @var array $data
     * @return Championship
     */
    public function create($data)
    {
        return Championship::create([
            'name' => $data['name']
        ]);
    }

    /**
     * Method to return a rank for championship
     *
     * @var array $data
     * @return array or null
     */
    public function rank($data)
    {
        $results = Championship::getWinPointsByTeams($data);

        if ($results instanceof Builder) {
            $results = [];
        }

        $results = Championship::getDrawPointsByTeams($data, $results);

        if ($results instanceof Builder) {
            $results = [];
        }

        $getCurentChampionshipTeams = Championship::find($data['championship_id'])->teams;

        if (!$getCurentChampionshipTeams->isEmpty()) {
            foreach ($getCurentChampionshipTeams as $team) {
                if (!array_key_exists($team->id, $results)) {
                    $results[$team->id] = 0;
                }
            }
        }

        if (empty($results)) {
            return NULL;
        }

        return $results;
    }
}
