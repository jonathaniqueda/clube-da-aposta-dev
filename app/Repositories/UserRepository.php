<?php

namespace App\Repositories;

use App\Model\SocialAccounts;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class UserRepository
{
    protected $user;

    public function __construct($id = null)
    {
        if (!empty($id)) {
            $this->user = User::find($id);
        }
    }

    /**
     * Method to return the instance of User.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Method to return the instance of User by email.
     *
     * @return User
     */
    public function getUserByEmail($email)
    {
        return User::where('email', '=', $email)->first();
    }


    /**
     * Method to create or get User infos.
     *
     * @return User
     */
    public function createOrGetSocialUser(ProviderUser $providerUser)
    {
        $account = SocialAccounts::where('provider', '=', 'facebook')
            ->where('provider_user_id', $providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccounts([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::where('email', '=', $providerUser->getEmail())->first();

            if (empty($user)) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
