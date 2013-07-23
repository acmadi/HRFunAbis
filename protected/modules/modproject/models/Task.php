<?php

/**
 * This is the model class for table "prj_task".
 *
 * The followings are the available columns in table 'prj_task':
 * @property integer $id
 * @property string $project_number
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $plan_start_date
 * @property string $plan_end_date
 * @property string $plan_progress
 * @property string $act_start_date
 * @property string $act_end_date
 * @property string $actual_progress
 * @property string $remarks
 * @property string $created_date
 * @property string $created_by
 */
class Task extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Task the static model class
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
		return 'prj_task';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_number, code, name, description, plan_start_date, plan_end_date, plan_progress, remarks', 'required'),
			array('project_number, code, created_by', 'length', 'max'=>50),
			array('name', 'length', 'max'=>200),
			array('plan_start_date, act_start_date', 'validateStartDate'),
			array('plan_end_date, act_end_date', 'validateEndDate'),
			array('plan_progress, actual_progress', 'length', 'max'=>11),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_number, code, name, description, plan_start_date, plan_end_date, plan_progress, act_start_date, act_end_date, actual_progress, remarks, created_date, created_by', 'safe', 'on'=>'search'),
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
			'project_number' => 'Nomor Proyek',
			'code' => 'Kode',
			'name' => 'Nama',
			'description' => 'Deskripsi',
			'plan_start_date' => 'Rencana Tanggal Mulai',
			'plan_end_date' => 'Rencana Tanggal Selesai',
			'plan_progress' => 'Progress yang Diharapkan',
			'act_start_date' => 'Tanggal Mulai',
			'act_end_date' => 'Tanggal Selesai',
			'actual_progress' => 'Progress',
			'remarks' => 'Keterangan',
			'created_date' => 'Tanggal Dibuat',
			'created_by' => 'Dibuat Oleh',
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
		$criteria->compare('project_number',$this->project_number,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('plan_start_date',$this->plan_start_date,true);
		$criteria->compare('plan_end_date',$this->plan_end_date,true);
		$criteria->compare('plan_progress',$this->plan_progress,true);
		$criteria->compare('act_start_date',$this->act_start_date,true);
		$criteria->compare('act_end_date',$this->act_end_date,true);
		$criteria->compare('actual_progress',$this->actual_progress,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getName($id)
	{
		return self::model()->findByPk($id)->name;
	}

	public function getCode($id)
	{
		return self::model()->findByPk($id)->code;
	}

	/**
	 * @param string the name of the attribute to be validated
	 * @param array options specified in the validation rule
	 */
	public function validateStartDate($attribute,$params)
	{
		if(!(Project::model()->validateDate($this->plan_start_date, $this->project_number)))
		{
			 $this->addError($attribute, 'Start date is invalid');
		}
	}
	
	/**
	 * @param string the name of the attribute to be validated
	 * @param array options specified in the validation rule
	 */
	public function validateEndDate($attribute,$params)
	{
		if(!(Project::model()->validateDate($this->plan_end_date, $this->project_number)))
		{
			 $this->addError($attribute, 'End date is invalid');
		}
	}
}