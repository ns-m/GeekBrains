<?php
//lesson8
namespace app\commands;

use app\models\AccessLog;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class LogRotateController extends Controller
{
    /**
     * @return int
     */
    public function actionAccess(): int
    {
        $total = AccessLog::find()->count('id');
        Console::startProgress(0, $total);
//        AccessLog::deleteAll([
//            '<', 'access_date', date('Y-m-d H:i:s')
//        ]);
        foreach (AccessLog::find()->each() as $index => $model){
            /*@var @model AccessLog*/
            $model->delet();
            Console::updateProgress($index+1, $total);
        }
        Console::endProgress();

        return ExitCode::OK;
    }
}