<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    protected $table = 'championships';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function match()
    {
        return $this->hasMany(Match::class);
    }

    /**
     * Scope a query to return the values of games win by teams.
     * If one team win, he get 3 points.
     * If one team loses, he get 0 point.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $request
     * @return array
     */
    public function scopeGetWinPointsByTeams($query, $request)
    {
        $resultsWin = $query->select(['teams.id', \DB::raw('COUNT(teams.id) as partidas_vencidas')])
            ->leftJoin('matches', 'matches.championship_id', '=', 'championships.id')
            ->leftJoin('teams', 'matches.team_win_id', '=', 'teams.id')
            ->where('championships.id', $request['championship_id'])
            ->whereNotNull('matches.team_win_id')
            ->groupBy('teams.id')
            ->orderBy('partidas_vencidas', 'DESC')
            ->get();

        $toReturn = [];
        if (!$resultsWin->isEmpty()) {
            foreach ($resultsWin as $index => $result) {
                $toReturn[$result->id] = $result->partidas_vencidas * 3;
            }
        }

        return $toReturn;
    }

    /**
     * Scope a query to return the values of games win by teams.
     * If one team draw, he get 1 point.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $request
     * @return array
     */
    public function scopeGetDrawPointsByTeams($query, $request, $resultsWin)
    {
        $resultsDraws = $query->select(['matches.team_a_id', 'matches.team_b_id'])
            ->leftJoin('matches', 'matches.championship_id', '=', 'championships.id')
            ->where('championships.id', $request['championship_id'])
            ->whereNull('matches.team_win_id')
            ->get();

        $toReturn = [];
        if (!$resultsDraws->isEmpty()) {
            foreach ($resultsDraws as $index => $result) {
                if (!empty($result->team_a_id) && isset($toReturn[$result->team_a_id])) {
                    $toReturn[$result->team_a_id]++;
                } else if (!empty($result->team_a_id)) {
                    $toReturn[$result->team_a_id] = 1;
                }

                if (!empty($result->team_b_id) && isset($toReturn[$result->team_b_id])) {
                    $toReturn[$result->team_b_id]++;
                } else if (!empty($result->team_b_id)) {
                    $toReturn[$result->team_b_id] = 1;
                }
            }
        }

        if (!empty($resultsWin)) {
            foreach ($resultsWin as $teamID => $result) {
                if (isset($toReturn[$teamID])) {
                    $resultsWin[$teamID] = $resultsWin[$teamID] + $toReturn[$teamID];
                }
            }

            return $resultsWin;
        }

        return $toReturn;
    }
}
