<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserCreateTrait;

class RegisterController extends BaseController
{
    use UserCreateTrait;
    public function register()
    {
        $credentials = $this->getCredentials();
        $isSuccess = false;
        $errors = [];

        // Validate username
        // ký tự, số và _, tối thiểu 6, tối đa 20 ký tự
        $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
        if (!preg_match($pattern, $credentials['username'])) {
            $errors['username'] = 'Only letters, numbers, underscore and at least 6 characters long allowed';
        }

        // validate email
        if (!filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }

        //validate password
        // chữ thường, chữ hoa, ký tự dặc biệt, min=8
        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
        if (!preg_match($pattern, $credentials['password'])) {
            $errors['password'] = 'Password must contains at least one capitalize letter, number and special character.';
        }

        //valid confirm password
        if ($credentials['password'] !== $credentials['confirm_password']) {
            $errors['confirm_password'] = 'Password does not match.';
        }

        //check if the username is already used?
        
        // if validate ok
        if (empty($errors)) {
           
        }
        
        $user = $this->createUser($credentials);
        if(!$user)   {
            $errors[] = 'This username is already used!';
            return $this->render('auth/register', ['errors' => $errors]);
        }      
        else {
            return $this->render('auth/login');
        }
    }

    public function getCredentials()
    {
        return [
            'username' => $_POST['username'] ?? null,
            'password' => $_POST['password'] ?? null,
            'email' => $_POST['email'] ?? null,
            'confirm_password' => $_POST['confirm_password'] ?? null,
            'created_at' => date("Y-m-d H:i:s")
        ];
    }
}