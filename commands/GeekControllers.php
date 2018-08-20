<?php
//lesson8
namespace app\commands;


use yii\base\Event;
use yii\console\Controller;
use yii\console\ExitCode;

class GeekControllers extends Controller
{
    /**
     * @return int
     */
    public function actionsIndex(): int
    {
        echo 'Hello, Friend!';

        return ExitCode::OK;
    }

    /**
     * @return int
     */
    public function actionsCount(): int
    {
        $count = \app\models\Event::find()->count('id');

        echo sprintf("Total of %s is: %d\n", \app\models\Event::class, $count);

        return ExitCode::OK;
    }
}