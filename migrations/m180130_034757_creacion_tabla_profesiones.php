<?php

use yii\db\Migration;

/**
 * Class m180130_034757_creacion_tabla_profesiones
 */
class m180130_034757_creacion_tabla_profesiones extends Migration
{
    /**
     * @inheritdoc
     */
    // public function safeUp()
    // {

    // }

    /**
     * @inheritdoc
     */
    // public function safeDown()
    // {
    //     echo "m180130_034757_creacion_tabla_profesiones cannot be reverted.\n";

    //     return false;
    // }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('profesiones', [
            'profesion_id' => $this->primaryKey()->defaultValue("nextval('sep_profesion_id'::regclass)"),
            'nombre' => $this->string(100)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('profesiones');
    }
}
