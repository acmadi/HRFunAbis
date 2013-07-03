<?php

/**
 * This is the model class for table "prj_personel".
 *
 * The followings are the available columns in table 'prj_personel':
 * @property integer $id
 * @property string $project_number
 * @property string $employee_id
 * @property string $name
 * @property string $position
 * @property string $position_task
 * @property string $start_join
 * @property string $end_join
 * @property string $telepon
 * @property string $email
 * @property string $remarks
 * @property string $created_by
 * @property string $created_date
 */
class Personel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Personel the static model class
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
		return 'prj_personel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_number, employee_id, name, position, position_task, start_join, end_join, telepon, email, remarks', 'required'),
			array('project_number, employee_id, position, telepon, email, created_by', 'length', 'max'=>50),
			array('name', 'length', 'max'=>100),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_number, employee_id, name, position, position_task, start_join, end_join, telepon, email, remarks, created_by, created_date', 'safe', 'on'=>'search'),
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
			'employee_id' => 'ID Pegawai',
			'name' => 'Nama',
			'position' => 'Jabatan',
			'position_task' => 'Task Jabatan',
			'start_join' => 'Tanggal Mulai Kerja',
			'end_join' => 'Tanggal Selesai Kerja',
			'telepon' => 'Telepon',
			'email' => 'Email',
			'remarks' => 'Keterangan',
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
		$criteria->compare('project_number',Yii::app()->session['project_number'],true);
		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('position_task',$this->position_task,true);
		$criteria->compare('start_join',$this->start_join,true);
		$criteria->compare('end_join',$this->end_join,true);
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}