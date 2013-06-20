<?php

/**
 * This is the model class for table "esms_outside_disposisi".
 *
 * The followings are the available columns in table 'esms_outside_disposisi':
 * @property integer $id
 * @property integer $outside_id
 * @property string $number
 * @property string $subject
 * @property string $disposisi_task
 * @property string $disposisi_from
 * @property string $disposisi_verified
 * @property string $disposisi_to
 * @property string $created_date
 * @property string $created_by
 */
class OutsideDisposisi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OutsideDisposisi the static model class
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
		return 'esms_outside_disposisi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('outside_id, number, subject, disposisi_task, disposisi_from, disposisi_verified, disposisi_to', 'required'),
			array('outside_id', 'numerical', 'integerOnly'=>true),
			array('number, disposisi_from, disposisi_to, created_by', 'length', 'max'=>50),
			array('subject, disposisi_task', 'length', 'max'=>200),
			array('disposisi_verified', 'length', 'max'=>20),
			array('created_date', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, outside_id, number, subject, disposisi_task, disposisi_from, disposisi_verified, disposisi_to, created_date, created_by', 'safe', 'on'=>'search'),
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
			'outside_id' => 'Outside',
			'number' => 'Nomor',
			'subject' => 'Judul',
			'disposisi_task' => 'Perintah Disposisi',
			'disposisi_from' => 'Disposisi Dari',
			'disposisi_verified' => 'Tanda Tangan',
			'disposisi_to' => 'Disposisi Ke',
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
		$criteria->compare('outside_id',$this->outside_id);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('disposisi_task',$this->disposisi_task,true);
		$criteria->compare('disposisi_from',$this->disposisi_from,true);
		$criteria->compare('disposisi_verified',$this->disposisi_verified,true);
		$criteria->compare('disposisi_to',$this->disposisi_to,true);
		//$criteria->condition = "disposisi_to = 'Yii::app()->user->getEmployeeID()'";  // date is database date column field
		
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}