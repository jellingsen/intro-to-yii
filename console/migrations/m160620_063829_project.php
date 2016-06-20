<?php

use yii\db\Migration;

class m160620_063829_project extends Migration
{
    public function up()
    {
        $this->createTable('project',[
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'slug' => $this->string(100),
            'description' => $this->text(),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        $this->addForeignKey(
            'fk_project_created_by',
            'project',
            'created_by',
            'user',
            'id'
        );

        $this->addForeignKey(
            'fk_project_updated_by',
            'project',
            'updated_by',
            'user',
            'id'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk_project_updated_by',
            'project'
        );

        $this->dropForeignKey(
            'fk_project_created_by',
            'project'
        );

        $this->dropTable('project');
    }
}
