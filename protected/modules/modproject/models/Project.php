<?php

/**
 * This is the model class for table "prj_project".
 *
 * The followings are the available columns in table 'prj_project':
 * @property integer $id
 * @property string $number
 * @property string $name
 * @property string $owner
 * @property string $description
 * @property string $version
 * @property string $version_date
 * @property string $status
 * @property string $status_date
 * @property string $location
 * @property string $plan_start_date
 * @property string $plan_end_date
 * @property string $act_start_date
 * @property string $act_end_date
 * @property integer $duration
 * @property string $spmk_date
 * @property integer $amount
 * @property string $pic
 * @property string $created_by
 * @property string $created_date
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'prj_project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number, name, owner, description, version, version_date, plan_start_date, plan_end_date, amount, pic', 'required'),
			array('duration, amount', 'numerical', 'integerOnly'=>true),
			array('number, owner, pic, created_by', 'length', 'max'=>50),
			array('name', 'length', 'max'=>300),
			array('version, status', 'length', 'max'=>20),
			array('location', 'length', 'max'=>200),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, number, name, owner, description, version, version_date, status, status_date, location, plan_start_date, plan_end_date, act_start_date, act_end_date, duration, spmk_date, amount, pic, created_by, created_date', 'safe', 'on'=>'search'),
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
			'number' => 'Nomor Proyek',
			'name' => 'Nama Proyek',
			'owner' => 'Pemilik',
			'description' => 'Deskripsi',
			'version' => 'Versi',
			'version_date' => 'Tanggal Versi',
			'status' => 'Status',
			'status_date' => 'Tanggal Status',
			'location' => 'Lokasi',
			'plan_start_date' => 'Plan Start Date',
			'plan_end_date' => 'Plan End Date',
			'act_start_date' => 'Actual Start Date',
			'act_end_date' => 'Actual End Date',
			'duration' => 'Durasi',
			'spmk_date' => 'Tanggal SPMK',
			'amount' => 'Nilai Kontrak',
			'pic' => 'PIC',
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
		$criteria->compare('number',$this->number,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('version_date',$this->version_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('status_date',$this->status_date,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('plan_start_date',$this->plan_start_date,true);
		$criteria->compare('plan_end_date',$this->plan_end_date,true);
		$criteria->compare('act_start_date',$this->act_start_date,true);
		$criteria->compare('act_end_date',$this->act_end_date,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('spmk_date',$this->spmk_date,true);
		$criteria->compare('amount',$this->amount);

		if (Yii::app()->user->isRole('Super->Super->Project')) {
			$criteria->compare('pic',$this->pic,true);
		} else {
			$criteria->compare('pic',Yii::app()->user->getEmployeeID(),true);
		}
		


		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function updateProgress($id, $progress, $progress_plan)
	{
		$data = self::model()->findByPk($id);
		$data->progress = $progress;
		$data->progress_plan = $progress_plan;
		$data->update();
	}

	public function getNameByNumber($number)
	{
		return self::model()->findByAttributes(array('number'=>$number))->name;
	}

	public function getNumberOfWeeks()
	{
		return ceil(abs((strtotime($this->plan_end_date)-strtotime($this->plan_start_date)))/(86400*7));
	}

	public function getNumberOfDays()
	{
		return (strtotime($this->plan_end_date)-strtotime($this->plan_start_date))/86400;
	}
}