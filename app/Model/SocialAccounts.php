<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialAccounts extends Model
{
    protected $table = 'social_accounts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id'
        , 'provider_user_id'
        , 'provider'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
