<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 16.05.17
 * Time: 19:55
 */

class SiteController
{
    public function actionLogin()
    {
        echo 'login';

        return true;
    }

    public function actionSignup()
    {
        $alert = '';

        if (isset($_POST['submit'])) {
            $user = new \Comments\models\User();

            $sameUsernameUser = $user->find(['username' => $_POST['username']]);

            $sameEmailUser = $user->find(['email' => $_POST['email']]);

            if (empty($sameEmailUser) == false) {
                $alert = 'User with this email already exists';
            }

            if (empty($sameUsernameUser) == false) {
                $alert = 'User with this username already exists';
            }

            if (trim($_POST['password']) != (trim($_POST['repeat_password']))) {
                $alert = 'Passwords not match';
            }

            if (trim($_POST['repeat_password']) == '') {
                $alert = 'Repeat password';
            }

            if (trim($_POST['password']) == '') {
                $alert = 'Enter password';
            }

            if (trim($_POST['email']) == '') {
                $alert = 'Enter e-mail';
            }

            if (trim($_POST['username']) == '') {
                $alert = 'Enter username';
            }

            if (empty($alert)) {
                (new \Comments\models\User())->insert([
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]);
            }
        }

        $title = 'Signup';

        $view = ROOT . '/views/site/signup.php';

        require_once ROOT . '/views/layouts/main.php';

        return true;
    }
}