<?php

/**
 * This is the model class for table "education".
 *
 * The followings are the available columns in table 'education':
 * @property integer $id
 * @property string $employee_id
 * @property string $university
 * @property string $town
 * @property string $status_university
 * @property string $is_foreign
 * @property string $year_start
 * @property string $year_finish
 * @property string $strata
 */
class Education extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Education the static model class
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
		return 'hr_education';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, university, strata, year_start, year_finish', 'required'),
			array('employee_id, town', 'length', 'max'=>20),
			array('university', 'length', 'max'=>30),
			array('formal_edu, major, rating_type', 'length', 'max'=>50),
			array('status_university, is_foreign, strata', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, university, town,formal_edu, major, rating_type, status_university, is_foreign, year_start, year_finish, strata', 'safe', 'on'=>'search'),
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
			'employee_id' => 'Employee',
			'university' => 'Universitas',
			'formal_edu' => 'Fakultas',
			'major'=> 'Jurusan', 
			'rating_type' => 'IPK',
			'town' => 'Kota',
			'status_university' => 'Status University',
			'is_foreign' => 'Is Foreign',
			'year_start' => 'Mulai',
			'year_finish' => 'Selesai',
			'strata' => 'Tingkat',
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
		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('university',$this->university,true);
		$criteria->compare('formal_edu',$this->formal_edu,true);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('rating_type',$this->rating_type,true);
		$criteria->compare('status_university',$this->status_university,true);
		$criteria->compare('is_foreign',$this->is_foreign,true);
		$criteria->compare('year_start',$this->year_start,true);
		$criteria->compare('year_finish',$this->year_finish,true);
		$criteria->compare('strata',$this->strata,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//dropdown list
	//1. status university
	const TYPE_G = 'negeri';
	const TYPE_S = 'swasta';

	public function getStatusOptions()
	{
		return array
		(
			self::TYPE_G=>'negeri',
			self::TYPE_S=>'swasta',
		);
	}
	
	//2. strata
	const TYPE_S1 = 'S1';
	const TYPE_S2 = 'S2';
	const TYPE_S3 = 'S3';
	const TYPE_D3 = 'D3';
	const TYPE_SMK = 'SMK';
	
	public function getStrataOptions()
	{
		return array
		(
			self::TYPE_S1=>'S1',
			self::TYPE_S2=>'S2',
			self::TYPE_S3=>'S3',
			self::TYPE_D3=>'D3',
			self::TYPE_SMK=>'SMK',
		);
	}
}