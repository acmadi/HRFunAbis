<?php

/**
 * This is the model class for table "sppd_status_tracking".
 *
 * The followings are the available columns in table 'sppd_status_tracking':
 * @property integer $id
 * @property integer $sppd_id
 * @property string $status
 * @property string $status_date
 * @property string $notes
 * @property string $notes_by
 */
class StatusTracking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StatusTracking the static model class
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
		return 'sppd_status_tracking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sppd_id, status, status_date, notes, notes_by', 'required'),
			array('sppd_id', 'numerical', 'integerOnly'=>true),
			array('notes_by, status', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sppd_id, status, status_date, notes, notes_by', 'safe', 'on'=>'search'),
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
			'sppd_id' => 'Sppd',
			'status' => 'Status',
			'status_date' => 'Status Date',
			'notes' => 'Notes',
			'notes_by' => 'Notes By',
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
		$criteria->compare('sppd_id',$this->sppd_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('status_date',$this->status_date,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('notes_by',$this->notes_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	const STATUS_1 = 'CREATED';
	const STATUS_2 = 'REQUEST_FOR_MANAGER_APPROVAL';
	const STATUS_3 = 'MANAGER_REVIEWED';
	const STATUS_4 = 'REJECTED';
	const STATUS_5 = 'MANAGER_APPROVED';
	const STATUS_6 = 'REQUEST_FOR_FINANCE_APPROVAL';
	const STATUS_7 = 'FINANCE_REVIEWED';
	const STATUS_9 = 'FINANCE_VALIDATED';
	const STATUS_10 = 'PAID';
	const STATUS_11 = 'ON_PROCESS';
	const STATUS_12 = 'REQUEST_FOR_ACCOUNTABILITY_APPROVAL';
	const STATUS_13 = 'ACCOUNTABILITY_REVIEWED';
	const STATUS_14 = 'CLOSED';

	public function getStatusList()
	{
		return array(
			self::STATUS_1 => 'Created',
			self::STATUS_2 => 'Request for Manager Approval',
			self::STATUS_3 => 'Manager Reviewed',
			self::STATUS_4 => 'Rejected',
			self::STATUS_5 => 'Manager Approved',
			self::STATUS_6 => 'Request for Finance Approval',
			self::STATUS_7 => 'Finance Reviewed',
			self::STATUS_9 => 'Finance Validated',
			self::STATUS_10 => 'Paid',
			self::STATUS_11 => 'On Process',
			self::STATUS_12 => 'Request for Accountability Approval',
			self::STATUS_13 => 'Accountability Reviewed',
			self::STATUS_14 => 'Closed',
			);
	}

	public function createStatus($sppd_id, $status, $notes, $notesBy)
	{
		$stat = new StatusTracking;
		$stat->sppd_id = $sppd_id;
		$stat->status = $status;
		$stat->status_date = date('Y-m-d',time());
		$stat->notes = $notes;
		$stat->notes_by = $notesBy;
		$stat->save();
	}
}