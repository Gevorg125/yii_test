<?php

class m190127_155822_insert_user_agent_table extends CDbMigration
{
	public function up()
	{
        $this->insert('user_agent',array(
            'name' =>'Agent One',
        ));
        $this->insert('user_agent',array(
            'name' =>'Agent Two',
        ));
        $this->insert('user_agent',array(
            'name' =>'Agent Three',
        ));
        $this->insert('user_agent',array(
            'name' =>'Agent Four',
        ));
	}

	public function down()
	{
		echo "m190127_155822_insert_user_agent_table does not support migration down.\n";
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