<?php

/**
 * This is the model class for table "sppd_reimburse_bbm".
 *
 * The followings are the available columns in table 'sppd_reimburse_bbm':
 * @property integer $id
 * @property integer $sppd_id
 * @property string $date
 * @property string $transaction_description
 * @property integer $amount
 * @property string $cc
 * @property string $usage_type
 * @property string $created_date
 * @property string $created_by
 */
class ReimburseBBM extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ReimburseBBM the static model class
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
		return 'sppd_reimburse_bbm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sppd_id, date, transaction_description, amount, usage_type, created_date, created_by', 'required'),
			array('amount', 'numerical', 'integerOnly'=>true),
			array('cc, created_by', 'length', 'max'=>50),
			array('usage_type', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, transaction_description, amount, cc, usage_type, created_date, created_by', 'safe', 'on'=>'search'),
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
			'date' => 'Tanggal',
			'transaction_description' => 'Keterangan',
			'amount' => 'Jumlah',
			'cc' => 'Cc',
			'usage_type' => 'No. Rekening Tujuan',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('transaction_description',$this->transaction_description,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('cc',$this->cc,true);
		$criteria->compare('usage_type',$this->usage_type,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}