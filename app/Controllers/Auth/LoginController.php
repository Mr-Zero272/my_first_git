<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;

class LoginController extends BaseController
{
    use UserAuthenticateTrait;

    public function showLoginForm()
    {
        //if it directed to home page
        if (check_login () == true) {
            redirect("/home");
        }

        $error = [];
        return $this->render('auth/login');
    }

    public function login() {
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);
        if ($user) {
            $user -> password = null; //remove password
            $_SESSION['user'] = serialize($user); // convert model to string

            if(isset($_POST['remember_me'])) {
                //convert to string to encrypt
                $str = serialize($credentials);

                //the function encrypt is defined in helpers.
                $encrypted = encrypt($str, ENCRYPTION_KEY);
                // cookie out of time 01/12/2022 23:59:59
                setcookie('credentials', $encrypted, mktime(23, 59, 59, 12, 1, 2022));

            }
            redirect('/home');
        }
        $errors[] = 'Username or password is invalid!';

        // if user login failed, it will show form login and show error
        return $this->render('auth/login', ['errors' => $errors]);
    }

    public function getCredentials()
    {
        return [
            'username' => $_POST['username'] ?? null,
            'password' => $_POST['password'] ?? null
        ];
    }

    public function logout() {
        $this-> signout();
        redirect('/home');
    }
}
?>