<?php

namespace app\controllers;


use app\common\components\BaseWebController;
use app\common\services\applog\AppLogService;
use yii\log\FileTarget;


class ErrorController extends BaseWebController
{
    public function actionError()
    {  //记录数据到数据库
        $error = \Yii::$app->errorHandler->exception;
        $err_msg = "";
        if ($error) {
            $file = $error->getFile();
            $line = $error->getLine();
            $message = $error->getMessage();
            $code = $error->getCode();
            $log = new FileTarget();
            $log->logFile = \Yii::$app->getRuntimePath() . "/logs/err.log";
            $err_msg = $message . " [file:{$file}][line:{$line}][code:{$code}][url:{$_SERVER['REQUEST_URI']}][POST_DATA:" . http_build_query($_POST) . "]";
            $log->messages[] = [
                $err_msg,
                1,
                'application',
                microtime(true)
            ];
            $log->export();
            // todo 日志写入数据库
            AppLogService::addErrorLog(\Yii::$app->id,$err_msg);
        }
        return $this->render("error", ["err_msg" => $err_msg]);

        // return "错误页面<br/>错误信息:".$err_msg;
    }
}
