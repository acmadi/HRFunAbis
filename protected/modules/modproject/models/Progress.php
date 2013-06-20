<?php

/**
 * This is the model class for table "prj_progress".
 *
 * The followings are the available columns in table 'prj_progress':
 * @property integer $id
 * @property string $project_number
 * @property string $period_date
 * @property integer $period_week
 * @property integer $period_month
 * @property integer $period_year
 * @property integer $progress
 * @property integer $description
 * @property string $termin_pgn
 * @property string $termin_vendor
 * @property string $progress_actual
 * @property string $progress_plan
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

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_number, period_date, period_week, period_month, period_year, progress, description, termin_pgn, termin_vendor, progress_actual, progress_plan, progress_this_week, completed_work, work_remaining, reason_of_delay, pic', 'required'),
			array('period_week, period_month, period_year, progress, description', 'numerical', 'integerOnly'=>true),
			array('project_number, pic, created_by', 'length', 'max'=>50),
			array('progress_actual, progress_plan', 'length', 'max'=>11),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_number, period_date, period_week, period_month, period_year, progress, description, termin_pgn, termin_vendor, progress_actual, progress_plan, progress_this_week, completed_work, work_remaining, reason_of_delay, pic, created_date, created_by', 'safe', 'on'=>'search'),
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
			'project_number' => 'Project Number',
			'period_date' => 'Period Date',
			'period_week' => 'Period Week',
			'period_month' => 'Period Month',
			'period_year' => 'Period Year',
			'progress' => 'Progress',
			'description' => 'Description',
			'termin_pgn' => 'Termin Pgn',
			'termin_vendor' => 'Termin Vendor',
			'progress_actual' => 'Progress Actual',
			'progress_plan' => 'Progress Plan',
			'progress_this_week' => 'Progress This Week',
			'completed_work' => 'Completed Work',
			'work_remaining' => 'Work Remaining',
			'reason_of_delay' => 'Reason Of Delay',
			'pic' => 'Pic',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
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
		$criteria->compare('period_date',$this->period_date,true);
		$criteria->compare('period_week',$this->period_week);
		$criteria->compare('period_month',$this->period_month);
		$criteria->compare('period_year',$this->period_year);
		$criteria->compare('progress',$this->progress);
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
}