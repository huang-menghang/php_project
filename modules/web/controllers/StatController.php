<?php

namespace app\modules\web\controllers;
use app\modules\web\controllers\common\BaseController;


/**
 * Default controller for the `web` module
 */
class StatController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function __construct($id,$module,array $config =[])
    {
        parent::__construct($id,$module,$config);
        $this->layout="main";
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProduct()
    {
        return $this->render('product');
    }

    public function actionMember()
    {
        return $this->render('member');
    }
    public function actionShare()
    {
        return $this->render('share');
    }
}
