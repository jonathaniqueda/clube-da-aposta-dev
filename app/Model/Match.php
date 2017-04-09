<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'matches';
    protected $primaryKey = 'id';

    protected $fillable = [
        'team_a_id'
        , 'team_b_id'
        , 'team_win_id'
        , 'championship_id'
        , 'team_a_goals'
        , 'team_b_goals'
        , 'match_day'
    ];

    protected $appends = [
        'result_formated'
    ];

    public function getTeamWinAttribute()
    {
    }

    public function getResultFormatedAttribute()
    {
        return $this->attributes['team_a_goals'] . ' x ' . $this->attributes['team_b_goals'];
    }

    public function getMatchDayAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    public function teamA()
    {
        return $this->belongsTo(Team::class, 'team_a_id', 'id');
    }

    public function teamB()
    {
        return $this->belongsTo(Team::class, 'team_b_id', 'id');
    }

    public function teamWin()
    {
        return $this->belongsTo(Team::class, 'team_win_id', 'id');
    }

    public function championship()
    {
        return $this->belongsTo(Championship::class);
    }
}
