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

        $create = 'create.php';

        $alert = '';

        if (isset($_POST['submit']) && isset($_POST['content'])) {

            if (trim($_POST['content']) == '') {
                $alert = 'Enter content';
            }

            if (empty($alert)) {

                $comment = new Message();

                $comment->insert([
                    'author' => $_SESSION['user']['id'],
                    'content' => $_POST['content'],
                    'date' => date("Y-m-d H:i:s"),
                    'parent_id' => 0
                ]);

                header('Location: /index');
            }
        }

        require_once ROOT . '/views/layouts/main.php';

        return true;
    }

    public function actionUpdate($id)
    {
        Comments\config\DataBase::getConnection();

        $comment = new Message();

        $message = $comment->findById($id);

        $alert = '';

        if (isset($_POST['submit'])) {

            if (trim($_POST['content']) == '') {
                $alert = 'Enter content';
            }

            if (empty($alert) && $message['author'] == $_SESSION['user']['id']) {

                $comment->update([
                    'content' => $_POST['content']
                ], $id);
                header('Location: /index');
            }
        }

        $title = 'Update comment';

        $view = ROOT . '/views/comment/update.php';

        require_once ROOT . '/views/layouts/main.php';

        return true;
    }

    public function actionDelete($id)
    {
        $comment = new Message();

        $message = $comment->findById($id);

        if ($message['author'] == $_SESSION['user']['id']) {
            $comment->delete($id);

            header('Location: /index');
        }
    }
}