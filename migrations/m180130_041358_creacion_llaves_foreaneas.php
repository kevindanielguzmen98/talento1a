<?php

use yii\db\Migration;

/**
 * Class m180130_041358_creacion_llaves_foreaneas
 */
class m180130_041358_creacion_llaves_foreaneas extends Migration
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
    //     echo "m180130_041358_creacion_llaves_foreaneas cannot be reverted.\n";

    //     return false;
    // }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        /* Creación de llaves foraneas personas */
        $this->addForeignKey(
            'fk_personas_profesion',
            'personas',
            'profesion',
            'profesiones',
            'profesion_id',
            'NO ACTION'
        );
        $this->addForeignKey(
            'fk_personas_municipio',
            'personas',
            'municipio',
            'municipios',
            'municipio_id',
            'NO ACTION'
        );
    }

    public function down()
    {
        /* Eliminación de llaves foraneas */
        $this->dropForeignKey(
            'fk_personas_profesion',
            'personas'
        );
        $this->dropForeignKey(
            'fk_personas_municipio',
            'personas'
        );
    }
}
