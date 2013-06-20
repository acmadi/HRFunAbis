<?php

/**
 * This is the model class for table "srv_amr_data_request".
 *
 * The followings are the available columns in table 'srv_amr_data_request':
 * @property integer $id
 * @property string $request_type
 * @property string $request_date
 * @property string $request_by
 * @property string $request_phone_email
 * @property string $request_division
 * @property string $request_issue
 * @property string $request_description
 * @property string $request_solved_by
 * @property string $request_answer
 * @property string $request_attachment
 * @property string $request_close_date
 * @property string $created_by
 * @property string $created_date
 */
class DataRequest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DataRequest the static model class
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
		return 'srv_amr_data_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('request_type, request_date, request_by, request_phone_email, request_division, request_issue, request_description', 'required'),
			array('request_type, request_phone_email, request_division', 'length', 'max'=>30),
			array('request_by, request_issue, request_solved_by, created_by', 'length', 'max'=>50),
			array('request_attachment', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, request_type, request_date, request_by, request_phone_email, request_division, request_issue, request_description, request_solved_by, request_answer, request_attachment, request_close_date, created_by, created_date', 'safe', 'on'=>'search'),
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
			'request_type' => 'Request Type',
			'request_date' => 'Request Date',
			'request_by' => 'Request By',
			'request_phone_email' => 'Request Phone Email',
			'request_division' => 'Request Division',
			'request_issue' => 'Request Issue',
			'request_description' => 'Request Description',
			'request_solved_by' => 'Request Solved By',
			'request_answer' => 'Request Answer',
			'request_attachment' => 'Request Attachment',
			'request_close_date' => 'Request Close Date',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
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
		$criteria->compare('request_type',$this->request_type,true);
		$criteria->compare('request_date',$this->request_date,true);
		$criteria->compare('request_by',$this->request_by,true);
		$criteria->compare('request_phone_email',$this->request_phone_email,true);
		$criteria->compare('request_division',$this->request_division,true);
		$criteria->compare('request_issue',$this->request_issue,true);
		$criteria->compare('request_description',$this->request_description,true);
		$criteria->compare('request_solved_by',$this->request_solved_by,true);
		$criteria->compare('request_answer',$this->request_answer,true);
		$criteria->compare('request_attachment',$this->request_attachment,true);
		$criteria->compare('request_close_date',$this->request_close_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Phone or Email
	 * */
	const TYPE_P = 'Phone';
	const TYPE_E = 'Email';
	
	public function getPhoneOrMail()
	{
		return array
		(
			self::TYPE_P=>'Phone',
			self::TYPE_E=>'Email',
		);
	}
}