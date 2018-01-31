<?php

use yii\db\Migration;

/**
 * Class m180131_152719_creacion_columna_tabla_personas
 */
class m180131_152719_creacion_columna_tabla_personas extends Migration
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
    //     echo "m180131_152719_creacion_columna_tabla_personas cannot be reverted.\n";

    //     return false;
    // }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('personas', 'fecha_nacimiento', $this->date());
    }

    public function down()
    {
        $this->dropColumn('personas', 'fecha_nacimiento');
    }
}
