<?php

use yii\db\Migration;

/**
 * Class m180130_034833_creacion_tabla_municipios
 */
class m180130_034833_creacion_tabla_municipios extends Migration
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
    //     echo "m180130_034833_creacion_tabla_municipios cannot be reverted.\n";

    //     return false;
    // }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('municipios', [
            'municipio_id' => $this->primaryKey()->defaultValue("nextval('sep_municipio_id'::regclass)"),
            'nombre' => $this->string(150)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('municipios');
    }
}
