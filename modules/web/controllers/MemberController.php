<?php

namespace app\modules\web\controllers;

use yii\web\Controller;

/**
 * Default controller for the `web` module
 */
class MemberController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout=false;
        return $this->render('index');
    }
    public function actionInfo()
    {
        $this->layout=false;
        return $this->render('info');
    }

    public function actionSet()
    {
        $this->layout=false;
        return $this->render('set');
    }


}
