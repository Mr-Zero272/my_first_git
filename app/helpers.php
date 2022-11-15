<?php
if (!function_exists('config')) {
    /**
     * Read the value in app/config/*
     * 
     * @param string $key
     * @return array|string|mix
     */
    function config($key)
    {
        /**
         * @var array|mixed
         */
        $config = $GLOBALS['config'];
        return $config->get($key);
    }
}

if (!function_exists('redirect')){
    //direct to another site
    function redirect($location) {
        if (ob_get_level()) {
            ob_end_clean();
        }

        header('Location: ' . $location);
        exit();
    }
}

if (!function_exists('check_login')){
    function check_login(){
        return isset($_SESSION['user']) ? true : false;
    }
}

if (!function_exists('encrypt')) {
    function encrypt($pure_string, $encryption_key) {
        $ciphering = "AES-128-CTR";

        //Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        //Non-NULL Initialization Vector for encrytion
        $encryption_iv = '1234567891011121';

        //Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt(
            $pure_string,
            $ciphering,
            $encryption_key, 
            $options,
            $encryption_iv
        );
        return $encryption;
    }
}

if(!function_exists('decrypt')) {
    function decrypt($encrypted_string, $encryption_key)
    {
        $ciphering = "AES-128-CTR";

        //Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        //Non-NULL Initialization Vector for encrytion
        $decryption_iv = '1234567891011121';

        //Use openssl_decrypt() function to decrypt the data
        $decryption = openssl_decrypt(
            $encrypted_string,
            $ciphering,
            $encryption_key, 
            $options,
            $decryption_iv
        );
        return $decryption;
    }
}

if (!function_exists('password_encrypt')){
    function password_encrypt($password)
    {
        $options = [
            'cost' => 12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}

if(!function_exists('password_check')) {
    function password_check($password, $password_hash) {
        return password_verify($password, $password_hash);
    }
}

if (!function_exists('auth')) {
    /**
     * Return User model if login successfully
     * 
     * @return \App\Models\User|mixed
     */
    function auth()
    {
        $userSerialized = $_SESSION['user'] ?? null;

        $user = $userSerialized ? unserialize($userSerialized) : null;

        return $user;
    }
}
?>