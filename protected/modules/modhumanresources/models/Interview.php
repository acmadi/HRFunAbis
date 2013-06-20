<?php

/**
 * This is the model class for table "hr_rec_interview".
 *
 * The followings are the available columns in table 'hr_rec_interview':
 * @property integer $id
 * @property string $candidate_id
 * @property string $interview_type
 * @property string $interview_date
 * @property string $interview_result
 */
class Interview extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Interview the static model class
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
		return 'hr_rec_interview';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('candidate_id, interview_type, interview_date, interview_result', 'required'),
			array('candidate_id', 'length', 'max'=>20),
			array('interview_type', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, candidate_id, interview_type, interview_date, interview_result', 'safe', 'on'=>'search'),
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
			'candidate_id' => 'Candidate',
			'interview_type' => 'Interview Type',
			'interview_date' => 'Interview Date',
			'interview_result' => 'Interview Result',
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
		$criteria->compare('candidate_id',$this->candidate_id,true);
		$criteria->compare('interview_type',$this->interview_type,true);
		$criteria->compare('interview_date',$this->interview_date,true);
		$criteria->compare('interview_result',$this->interview_result,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//1. interview type
	const TYPE_1 = 'wawancara';
	const TYPE_2 = 'telepon';
	const TYPE_3 = 'psikotes';
	
	public function getInterviewOptions()
	{
		return array
		(
			self::TYPE_1=>'wawancara',
			self::TYPE_2=>'telepon',
			self::TYPE_3=>'psikotes',
		);
	}
}