<?php

use yii\db\Migration;

/**
 * Class m180807_195614_authors
 */
class m180807_195614_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('event', 'author_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m180807_195614_authors cannot be reverted.\n";
//
//        return false;
        $this->dropColumn('event', 'author_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180807_195614_authors cannot be reverted.\n";

        return false;
    }
    */
}
