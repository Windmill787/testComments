<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 16.05.17
 * Time: 11:38
 */

use Comments\models\Message;

class CommentController
{
    public function actionIndex()
    {
        $message = new Message();

        $messages = $message->findAll();

        $title = 'Commentaries';

        $view = ROOT . '/views/comment/index.php';

        require_once ROOT . '/views/layouts/main.php';

        return true;
    }

    public function actionUpdate($id)
    {
        echo 'comment/update';

        return true;
    }

    public function actionCreate()
    {
        $alert = '';

        if (isset($_POST['submit'])) {

            if (trim($_POST['content']) == '') {
                $alert = 'Enter content';
            }

            if (empty($alert)) {

                $comment = new Message();

                $comment->insert([
                    'author' => $_SESSION['user']['id'],
                    'content' => $_POST['content'],
                    'date' => date("Y-m-d H:i:s")
                ]);
            }
        }

        $title = 'Create comment';

        $view = ROOT . '/views/comment/create.php';

        require_once ROOT . '/views/layouts/main.php';

        return true;
    }

    public function actionDelete($id)
    {
        echo 'comment/delete';

        return true;
    }

    public function actionView($id)
    {
        echo 'comment/view';

        return true;
    }
}