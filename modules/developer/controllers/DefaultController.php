<?php

namespace app\modules\developer\controllers;

use yii\web\Controller;

/**
 * Default controller for the `developer` module
 */
class DefaultController extends Controller
{
    public $layout = 'PosLayout';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
