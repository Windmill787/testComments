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
        Comments\config\DataBase::getConnection();

        $alert = '';

        if (isset($_POST['submit'])) {
            $user = new \Comments\models\User();

            $loginUser = $user->find([
                'username' => $_POST['username']
            ]);

            if (empty($loginUser)) {
                $alert = 'Incorrect username';
            } else {
                if (password_verify($_POST['password'], $loginUser['password_hash'])) {
                    $_SESSION['user'] = $loginUser;
                    header('Location: /index');
                } else {
                    $alert = 'Incorrect password';
                }
            }

            if (trim($_POST['password']) == '') {
                $alert = 'Enter password';
            }

            if (trim($_POST['username']) == '') {
                $alert = 'Enter username';
            }
        }

        $title = 'Login';

        $view = ROOT . '/views/site/login.php';

        require_once ROOT . '/views/layouts/main.php';

        return true;
    }

    public function actionSignup()
    {
        Comments\config\DataBase::getConnection();

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
                $user->insert([
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]);
                $loginUser = $user->find([
                    'username' => $_POST['username']
                ]);
                $_SESSION['user'] = $loginUser;
                header('Location: /index');
            }
        }

        $title = 'Signup';

        $view = ROOT . '/views/site/signup.php';

        require_once ROOT . '/views/layouts/main.php';

        return true;
    }

    public function actionLogout() {

        \Comments\config\DataBase::getConnection();

        unset ($_SESSION['user']);

        header('Location: /index');
    }
}