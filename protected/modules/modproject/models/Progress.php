<?php

/**
 * This is the model class for table "prj_progress".
 *
 * The followings are the available columns in table 'prj_progress':
 * @property integer $id
 * @property string $project_number
 * @property string $period_date
 * @property string $period_date_to
 * @property integer $period_week
 * @property string $description
 * @property string $termin_pgn
 * @property string $termin_vendor
 * @property float $progress_actual
 * @property float $progress_plan
 * @property string $progress_this_week
 * @property string $completed_work
 * @property string $work_remaining
 * @property string $reason_of_delay
 * @property string $pic
 * @property string $created_date
 * @property string $created_by
 */
class Progress extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Progress the static model class
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
		return 'prj_progress';
	}

	//Dropdown Month
	const TYPE_1 = 1;
	const TYPE_2 = 2;
	const TYPE_3 = 3;
	const TYPE_4 = 4;
	const TYPE_5 = 5;
	const TYPE_6 = 6;
	const TYPE_7 = 7;
	const TYPE_8 = 8;
	const TYPE_9 = 9;
	const TYPE_10 = 10;
	const TYPE_11 = 11;
	const TYPE_12 = 12;

	public function getPeriodMonths()
	{
		return array (
			self::TYPE_1 =>'Januari',
			self::TYPE_2 =>'Februari',
			self::TYPE_3 =>'Maret',
			self::TYPE_4 =>'April',
			self::TYPE_5 =>'Mei',
			self::TYPE_6 =>'Juni',
			self::TYPE_7 =>'Juli',
			self::TYPE_8 =>'Agustus',
			self::TYPE_9 =>'September',
			self::TYPE_10 =>'Oktober',
			self::TYPE_11 =>'November',
			self::TYPE_12 =>'Desember',
			);
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_number, period_date, period_date_to, period_week, description, progress_actual, progress_plan, pic, progress_this_week, completed_work, work_remaining, reason_of_delay', 'required'),
			array('period_week', 'numerical', 'integerOnly'=>true),
			array('period_date', 'validateStartDate'),
			array('period_date_to', 'validateEndDate'),
			array('project_number, pic, created_by', 'length', 'max'=>50),
			array('progress_actual, progress_plan', 'length', 'max'=>11),
			//array('progress_this_week, completed_work, work_remaining, reason_of_delay', 'length', 'max'=>500),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_number, period_date, period_date_to,period_week, description, termin_pgn, termin_vendor, progress_actual, progress_plan, progress_this_week, completed_work, work_remaining, reason_of_delay, pic, created_date, created_by', 'safe', 'on'=>'search'),
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
			'period_date' => 'Tanggal Dari',
			'period_date_to' => 'Tanggal Sampai',
			'period_week' => 'Minggu Ke',
			'description' => 'Deskripsi',
			'termin_pgn' => 'Termin PGN',
			'termin_vendor' => 'Termin Vendor',
			'progress_actual' => 'Progress Actual',
			'progress_plan' => 'Progress Plan',
			'progress_this_week' => 'Progress Minggu ini',
			'completed_work' => 'Pekerjaan Selesai',
			'work_remaining' => 'Sisa Pekerjaan',
			'reason_of_delay' => 'Alasan Keterlambatan',
			'pic' => 'PIC',
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
		$criteria->compare('project_number',Yii::app()->session['project_number'],true);
		$criteria->compare('period_date',$this->period_date,true);
		$criteria->compare('period_date_to',$this->period_date_to,true);
		$criteria->compare('period_week',$this->period_week);
		$criteria->compare('description',$this->description);
		$criteria->compare('termin_pgn',$this->termin_pgn,true);
		$criteria->compare('termin_vendor',$this->termin_vendor,true);
		$criteria->compare('progress_actual',$this->progress_actual,true);
		$criteria->compare('progress_plan',$this->progress_plan,true);
		$criteria->compare('progress_this_week',$this->progress_this_week,true);
		$criteria->compare('completed_work',$this->completed_work,true);
		$criteria->compare('work_remaining',$this->work_remaining,true);
		$criteria->compare('reason_of_delay',$this->reason_of_delay,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	var $maxperiod;
	public function getPeriodWeek($project_number)
	{
		$criteria=new CDbCriteria;
		$criteria->select='MAX(period_week) as maxperiod';

		$criteria->condition='project_number = :project_number';
		$criteria->params = array(':project_number'=>$project_number);
		
		$row = Progress::model()->find($criteria);
		
		return $row['maxperiod'] + 1;
		// return $row->period_week;
	}

	public function getLatestProgress($project_number)
	{
		$progress = Progress::model()->findAllByAttributes(array('project_number'=>$project_number));
		if ($progress != null) {
			$latest = $progress[0];
			for ($i=1; $i < sizeof($progress); $i++) { 
				if ($progress[$i]->progress_actual > $latest->progress_actual) {
					$latest = $progress[$i];
				}
			}
		} else {
			$latest = new Progress;
		}
		return $latest;
	}
	
	/**
	 * @param string the name of the attribute to be validated
	 * @param array options specified in the validation rule
	 */
	public function validateStartDate($attribute,$params)
	{
		if(!(Project::model()->validateDate($this->period_date, $this->project_number)))
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
		if(!(Project::model()->validateDate($this->period_date_to, $this->project_number)))
		{
			 $this->addError($attribute, 'End date is invalid');
		}
	}
}