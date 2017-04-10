<?php

namespace App\Repositories;

use App\Model\Match;
use App\Model\Team;
use Carbon\Carbon;

class MatchesRepository
{
    private $match;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->match = Match::find($id);
        }
    }

    /**
     * Method to return the instance of Match.
     *
     * @return Match
     */
    public function get()
    {
        return $this->match;
    }

    /**
     * Method to create and return the instance of Match.
     *
     * @var array $data
     * @return Match
     */
    public function create($data)
    {
        $date = Carbon::createFromFormat('d/m/Y', $data['match_day'])->toDateString();

        $teamAGoals = $data['team_a_goals'];
        $teamBGoals = $data['team_b_goals'];

        if ($teamAGoals > $teamBGoals) {
            $win = $data['team_a_id'];
        } else if ($teamAGoals == $teamBGoals) {
            $win = NULL;
        } else {
            $win = $data['team_b_id'];
        }

        return Match::create([
            'team_a_id' => $data['team_a_id']
            , 'team_b_id' => $data['team_b_id']
            , 'team_win_id' => $win
            , 'championship_id' => $data['championship_id']
            , 'team_a_goals' => $data['team_a_goals']
            , 'team_b_goals' => $data['team_b_goals']
            , 'match_day' => $date
        ]);
    }
}
