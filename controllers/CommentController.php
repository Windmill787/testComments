<?php

/**
 * Created by PhpStorm.
 * User: max
 * Date: 16.05.17
 * Time: 11:38
 */

class CommentController
{
    public function actionIndex()
    {
        echo 'comment/index';

        return true;
    }

    public function actionUpdate($id)
    {
        echo 'comment/update';

        return true;
    }

    public function actionCreate()
    {
        echo 'comment/create';

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