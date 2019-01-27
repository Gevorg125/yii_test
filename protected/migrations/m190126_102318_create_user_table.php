<?php

class m190126_102318_create_user_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('users', array(
            'id'              => 'pk',
            'name'            => 'string',
            'sur_name'        => 'string',
            'middle_name'     => 'string',
            'birth_day'       => 'string',
            'passport_number' => 'string',
            'email'           => 'string',
            'phone_number'    => 'string',

        ), 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
	}

	public function down()
	{
		echo "m190126_102318_create_user_table does not support migration down.\n";
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