<?php

/**
 * This is the model class for table "fin_rekening_dc".
 *
 * The followings are the available columns in table 'fin_rekening_dc':
 * @property integer $id
 * @property string $code_kas
 * @property string $debit
 * @property string $credit
 * @property string $currency
 * @property string $date
 * @property string $transaction
 * @property string $created_date
 * @property string $created_by
 */
class KasDc extends CActiveRecord
{
	public $from_date;
	public $to_date;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KasDc the static model class
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
		return 'fin_kas_dc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code_kas, currency, date', 'required'),
			array('code_kas, elbi', 'length', 'max'=>20),
			array('transaction', 'length', 'max'=>200),
			array('debit', 'length', 'max'=>10),
			array('credit', 'length', 'max'=>11),
			array('currency', 'length', 'max'=>5),
			array('created_by', 'length', 'max'=>50),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code_kas, elbi, debit, credit, currency, date, transaction, created_date, created_by, from_date, to_date', 'safe', 'on'=>'search'),
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
			'code_kas' => 'Code Kas',
			'debit' => 'Debit',
			'credit' => 'Credit',
			'currency' => 'Currency',
			'date' => 'Date',
			'transaction' => 'Transaction',
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
			
			
		$criteria->compare('elbi',$this->elbi,true);
		$criteria->compare('debit',$this->debit,true);
		$criteria->compare('credit',$this->credit,true);
		$criteria->compare('currency',$this->currency,true);
		//$criteria->compare('date',$this->date,true);
		$criteria->compare('transaction',$this->transaction,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		
		//date between
		if(!empty($this->from_date) && empty($this->to_date))
        {
            $criteria->condition = "date >= '$this->from_date'";  // date is database date column field
        }
		elseif(!empty($this->to_date) && empty($this->from_date))
        {
            $criteria->condition = "date <= '$this->to_date'";
        }
		elseif(!empty($this->to_date) && !empty($this->from_date))
        {
            $criteria->condition = "date  >= '$this->from_date' and date <= '$this->to_date'";
        }
		
		// // if(isset(Yii::app()->session['kas']))
		// // {
			// $criteria->condition = "code_kas=".Yii::app()->session['kas'];
		// //}
		
		
		
		//end date between
		return new CActiveDataProvider($this, array(
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
			'criteria'=>$criteria,
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
		
	public function debitFunction($code_kas, $elbi, $date, $transaction, $amount, $ppn, $pph21, $pph23, $currency, $created_date, $created_by)
	{
		$sql="INSERT INTO `fin_kas_dc`
					  (`id`, `code_kas`,`elbi`, `date`, `transaction`, `credit`, `currency`, `created_date`, `created_by`) 
				VALUES(NULL, :code_kas, :elbi, :date, :transaction, :credit, :currency, :created_date, :created_by)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$command->bindParam(":code_kas",$code_kas,PDO::PARAM_STR);
		$command->bindParam(":elbi",$elbi,PDO::PARAM_STR);
		$command->bindParam(":date",$date,PDO::PARAM_STR);
		$command->bindParam(":transaction",$transaction,PDO::PARAM_STR);
		$command->bindParam(":credit",$amount,PDO::PARAM_STR);
		$command->bindParam(":currency",$currency,PDO::PARAM_STR);
		$command->bindParam(":created_date",$created_date,PDO::PARAM_STR);
		$command->bindParam(":created_by",$created_by,PDO::PARAM_STR);

		$command->execute();

		if($ppn > 0)
			$this->ppnFunction($code_kas, $elbi, $date, $transaction, $ppn, 'PPN', $currency, $created_date, $created_by);
		if($pph21 > 0)
			$this->pph21Function($code_kas, $elbi, $date, $transaction, $pph21, 'PPh 21', $currency, $created_date, $created_by);
		if($pph23 > 0)
			$this->pph23Function($code_kas, $elbi, $date, $transaction, $pph23, 'PPh 23', $currency, $created_date, $created_by);
	}
	
	public function ppnFunction($code_kas, $elbi, $date, $transaction, $pajak, $tipe, $currency, $created_date, $created_by)
	{
		$sql="INSERT INTO `fin_kas_dc`
					  (`id`, `code_kas`,`elbi`, `date`, `transaction`, `credit`, `currency`, `created_date`, `created_by`) 
				VALUES(NULL, :code_kas, :elbi, :date, :transaction, :credit, :currency, :created_date, :created_by)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$transaction = $tipe.' - '.$transaction;
		
		$elbi = '03306';
		
		$command->bindParam(":code_kas",$code_kas,PDO::PARAM_STR);
		$command->bindParam(":elbi",$elbi,PDO::PARAM_STR);
		$command->bindParam(":date",$date,PDO::PARAM_STR);
		$command->bindParam(":transaction",$transaction,PDO::PARAM_STR);
		$command->bindParam(":credit",$pajak,PDO::PARAM_STR);
		$command->bindParam(":currency",$currency,PDO::PARAM_STR);
		$command->bindParam(":created_date",$created_date,PDO::PARAM_STR);
		$command->bindParam(":created_by",$created_by,PDO::PARAM_STR);

		$command->execute();	
	}
	
	public function pph21Function($code_kas, $elbi, $date, $transaction, $pajak, $tipe, $currency, $created_date, $created_by)
	{
		$sql="INSERT INTO `fin_kas_dc`
					  (`id`, `code_kas`,`elbi`, `date`, `transaction`, `debit`, `currency`, `created_date`, `created_by`) 
				VALUES(NULL, :code_kas, :elbi, :date, :transaction, :credit, :currency, :created_date, :created_by)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$transaction = $tipe.' - '.$transaction;
		
		$elbi = '40301';
		
		$command->bindParam(":code_kas",$code_kas,PDO::PARAM_STR);
		$command->bindParam(":elbi",$elbi,PDO::PARAM_STR);
		$command->bindParam(":date",$date,PDO::PARAM_STR);
		$command->bindParam(":transaction",$transaction,PDO::PARAM_STR);
		$command->bindParam(":credit",$pajak,PDO::PARAM_STR);
		$command->bindParam(":currency",$currency,PDO::PARAM_STR);
		$command->bindParam(":created_date",$created_date,PDO::PARAM_STR);
		$command->bindParam(":created_by",$created_by,PDO::PARAM_STR);

		$command->execute();	
	}
	
	
	public function pph23Function($code_kas, $elbi, $date, $transaction, $pajak, $tipe, $currency, $created_date, $created_by)
	{
		$sql="INSERT INTO `fin_kas_dc`
					  (`id`, `code_kas`,`elbi`, `date`, `transaction`, `debit`, `currency`, `created_date`, `created_by`) 
				VALUES(NULL, :code_kas, :elbi, :date, :transaction, :credit, :currency, :created_date, :created_by)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$transaction = $tipe.' - '.$transaction;
		
		$elbi = '40303';
		
		$command->bindParam(":code_kas",$code_kas,PDO::PARAM_STR);
		$command->bindParam(":elbi",$elbi,PDO::PARAM_STR);
		$command->bindParam(":date",$date,PDO::PARAM_STR);
		$command->bindParam(":transaction",$transaction,PDO::PARAM_STR);
		$command->bindParam(":credit",$pajak,PDO::PARAM_STR);
		$command->bindParam(":currency",$currency,PDO::PARAM_STR);
		$command->bindParam(":created_date",$created_date,PDO::PARAM_STR);
		$command->bindParam(":created_by",$created_by,PDO::PARAM_STR);

		$command->execute();	
	}
	
	
	public function fetchDebit($records)
	{
        $sum=0;
        foreach($records as $record)
                $sum+=$record->debit;
        return $sum;
	}
	
	public function fetchCredit($records)
	{
        $sum=0;
        foreach($records as $record)
                $sum+=$record->credit;
        return $sum;
	} 	
}