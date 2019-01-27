<?php

class m190127_155303_create_user_agent_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('user_agent', array(
            'id'              => 'pk',
            'name'            => 'string',
        ), 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');


	}

	public function down()
	{
		echo "m190127_155303_create_user_agent_table does not support migration down.\n";
		return false;
	}

/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{

	}

	public function safeDown()
	{
	}
	*/
}