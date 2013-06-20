<?php

/**
 * This is the model class for table "rbac_user".
 *
 * The followings are the available columns in table 'rbac_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $profile
 * @property integer $status
 * @property string $employee_id
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rbac_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, salt, email, status, employee_id', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('username, password, salt, email', 'length', 'max'=>128),
			array('employee_id', 'length', 'max'=>20),
			array('profile', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, salt, email, profile, status, employee_id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'salt' => 'Salt',
			'email' => 'Email',
			'profile' => 'Profile',
			'status' => 'Status',
			'employee_id' => 'Employee',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('profile',$this->profile,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('employee_id',$this->employee_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}
	
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}


	public function generateSalt()
	{
		return uniqid('',true);
	}
	
	public function status($ii)
	{
		if($ii==0)
			return 'Belum Aktif / Banned';
		else 
			return 'Aktif';
	}
}