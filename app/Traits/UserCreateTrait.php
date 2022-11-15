<?php
namespace App\Traits;

use App\Models\User;

trait UserCreateTrait
{
    /**
     * Check the information of user
     * Check if password matches password_hash
     * 
     * @param array $credentials
     * @return \App\Models\User|mixed|null
     */
    public function createUser($credentials)
    {
        $user = User::where(['username' => $credentials['username']])->first();
        if (!$user) {
            $newuser = User::insert([
                'username'=>'hhh',
                'password'=>'hh',
                'email'=>'hh',
                'created_at'=>$credentials['created_at']
            ]);
            return $newuser;
        }
        return null;
    }
}
?>