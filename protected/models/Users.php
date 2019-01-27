<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $sur_name
 * @property string $middle_name
 * @property string $birth_day
 * @property integer $passport_number
 * @property string $email
 * @property string $phone_number

 */
class Users extends CActiveRecord
{
    public $name;
    public $sur_name;
    public $middle_name;
    public $email;
    public $phone_number;
    public $passport_number;
    public $birth_day;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('name, sur_name, middle_name, email, phone_number', 'length', 'max'=>255),
			array('birth_day', 'safe'),
			array('email', 'email'),
			array('name, sur_name, middle_name, birth_day, passport_number, email, phone_number','required'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'name' => Yii::t('app','Имя'),
			'sur_name' => Yii::t('app','Фамилия'),
			'middle_name' => Yii::t('app','Отчество'),
			'birth_day' => Yii::t('app','Дата рождения'),
			'passport_number' =>Yii::t('app', 'Серия и номер паспорта'),
			'email' => Yii::t('app','Email'),
			'phone_number' => Yii::t('app','Номер телефона'),

		);
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
