<?php

use yii\db\Migration;

/**
 * Class m180130_034808_creacion_tabla_personas
 */
class m180130_034808_creacion_tabla_personas extends Migration
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
    //     echo "m180130_034808_creacion_tabla_personas cannot be reverted.\n";

    //     return false;
    // }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        /* Creacion de tabla para personas */
        $this->createTable('personas', [
            'persona_id' => $this->primaryKey()->defaultValue("nextval('sep_persona_id'::regclass)"),
            'nombre' => $this->string(100)->notNull(),
            'profesion' => $this->integer()->notNull(),
            'municipio' => $this->integer()->notNull(),
            'correo_electronico' => $this->string(150)->notNull()
        ]);
    }

    public function down()
    {

        $this->dropTable('personas');
    }
}
