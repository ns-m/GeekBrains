<?php

use yii\db\Migration;

/**
 * Class m180807_122143_user_table
 */
class m180807_122143_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(),
            'password'=>$this->string(),
            'accessToken'=>$this->string(),

    ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m180807_122143_user_table cannot be reverted.\n";
//
//        return false;
        $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180807_122143_user_table cannot be reverted.\n";

        return false;
    }
    */
}
