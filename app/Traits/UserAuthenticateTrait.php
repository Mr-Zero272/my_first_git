<?php
namespace App\Traits;

use App\Models\User;

trait UserAuthenticateTrait
{
    /**
     * Check the information of user
     * Check if password matches password_hash
     * 
     * @param array $credentials
     * @return \App\Models\User|mixed|null
     */
    public function authenticate($credentials)
    {
        $user = User::where(['username' => $credentials['username']])->first();
        if ($user) {
            //check if password matches password_hash in database
            if (password_check($credentials['password'], password_hash($user->password, PASSWORD_BCRYPT))) {
                return $user;
            }
            return null;
        }
        return null;
    }

    public function signout()
    {
        unset($_SESSION['user']);

        //delete cookie by set timestamp to makes it out time
        if (isset($_COOKIE['credentials'])) {
            setcookie('credentials', null, time() - 3600);
        }
    }
}
?>