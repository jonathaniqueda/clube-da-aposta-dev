<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function teamA()
    {
        return $this->hasMany(Match::class, 'team_a_id', 'id');
    }

    public function teamB()
    {
        return $this->hasMany(Match::class, 'team_b_id', 'id');
    }

    public function teamWin()
    {
        return $this->hasMany(Match::class, 'team_win_id', 'id');
    }

    public function championship()
    {
        return $this->belongsToMany(Championship::class);
    }
}
