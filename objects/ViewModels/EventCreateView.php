<?php
/**
 * Created by PhpStorm.
 * User: Python
 * Date: 10-Aug-18
 * Time: 13:15
 */

class EventCreateView
{
    /**
     * @return array
     */
    public function getUserOptions(): array
    {
//        $users = User::find()->all();
//        return \yii\helpers\BaseArrayHelper::map($users, 'id', 'name');
        return User::find()->indexBy('id')->select('name', 'id')->column();

    }

}