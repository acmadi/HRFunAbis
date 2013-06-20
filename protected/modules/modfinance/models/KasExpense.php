<?php

/**
 * This is the model class for table "fin_kas_expense".
 *
 * The followings are the available columns in table 'fin_kas_expense':
 * @property integer $id
 * @property string $date
 * @property string $elbi
 * @property string $transaction
 * @property string $amount
 * @property string $created_date
 * @property string $created_by
 */
class KasExpense extends CActiveRecord
{
	public $is_ppn;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KasExpense the static model class
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
		return 'fin_kas_expense';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code_kas, date, elbi, transaction, currency,amount', 'required'),
			array('code_kas, elbi', 'length', 'max'=>20),
			array('amount, ppn, pph21, pph23', 'length', 'max'=>11),
			array('created_by', 'length', 'max'=>50),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code_kas, date, elbi, transaction, amount, created_date, created_by', 'safe', 'on'=>'search'),
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
			'code_kas' => 'Kode Kas',
			'date' => 'Date',
			'elbi' => 'Elbi',
			'transaction' => 'Transaction',
			'amount' => 'Amount',
			'ppn' => 'PPN',
			'pph21' => 'PPh 21',
			'pph23' => 'PPh 23',
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
		if(isset(Yii::app()->session['kas']))
			$criteria->compare('code_kas',Yii::app()->session['kas'],true);
		else
			$criteria->compare('code_kas',$this->code_kas,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('elbi',$this->elbi,true);
		$criteria->compare('transaction',$this->transaction,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		
		$criteria->compare('ppn',$this->created_by,true);
		$criteria->compare('pph21',$this->created_by,true);
		$criteria->compare('pph23',$this->created_by,true);
		
		$criteria->compare('status','UF',true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
		));
	}
	
	//1. get currency
	const TYPE_IDR = 'IDR';
	const TYPE_USD = 'USD';
	
	public function getCurrencyOptions()
	{
		return array
		(
			self::TYPE_IDR=>'IDR',
			self::TYPE_USD=>'USD',
		);
	}
	
	//1. get pajak
	const TYPE_ZR = 'Kosong';
	const TYPE_PPN = 'PPN';
	const TYPE_PPH = 'PPH';
	
	public function getPajakOptions()
	{
		return array
		(
			self::TYPE_ZR=>'Kosong',
			self::TYPE_PPN=>'PPN',
			self::TYPE_PPH=>'PPH',
		);
	}
}