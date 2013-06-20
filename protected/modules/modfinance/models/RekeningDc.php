<?php

/**
 * This is the model class for table "fin_rekening_dc".
 *
 * The followings are the available columns in table 'fin_rekening_dc':
 * @property integer $id
 * @property string $nomor_rek
 * @property string $debit
 * @property string $credit
 * @property string $currency
 * @property string $date
 * @property string $description
 * @property string $created_date
 * @property string $created_by
 */
class RekeningDc extends CActiveRecord
{
	public $from_date;
	public $to_date;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RekeningDc the static model class
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
		return 'fin_rekening_dc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nomor_rek, currency, date, description', 'required'),
			array('akun, kode_pembantu, nomor_rek', 'length', 'max'=>20),
			array('debit', 'length', 'max'=>11),
			array('credit', 'length', 'max'=>11),
			array('currency', 'length', 'max'=>5),
			array('created_by', 'length', 'max'=>50),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nomor_rek, debit, credit, currency, date, description, created_date, created_by', 'safe', 'on'=>'search'),
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
			'nomor_rek' => 'Nomor Rekening',
			'debit' => 'Debit',
			'credit' => 'Credit',
			'currency' => 'Currency',
			'date' => 'Tanggal',
			'description' => 'Keterangan',
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
		$criteria->compare('akun',$this->akun,true);
		$criteria->compare('kode_pembantu',$this->kode_pembantu,true);
		
		if(isset(Yii::app()->session['bank']))
			$criteria->compare('nomor_rek',Yii::app()->session['bank'],true);
		else
			$criteria->compare('nomor_rek',$this->nomor_rek,true);
			
		$criteria->compare('debit',$this->debit,true);
		$criteria->compare('credit',$this->credit,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('description',$this->description,true);
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
		
		//end date between
		
		return new CActiveDataProvider($this, array(
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

	// public function debitFunction($value, $curr, $code)
	// {
		// $model = new RekeningDc;
		// $model->nomor_rek = 'kas-'.$code;
		// $model->debit = $value;
		// $model->save();
	// }
	
	public function debitFunction($value, $curr, $code)
	{
		$sql="INSERT INTO `fin_rekening_dc`
					  (`id`, `nomor_rek`, `debit`, `currency`) 
				VALUES(NULL,  :nomor_rek, :debit, :currency)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$code = 'kas-'.$code;
		
		$command->bindParam(":nomor_rek",$code,PDO::PARAM_STR);
		$command->bindParam(":debit",$value,PDO::PARAM_STR);
		// $command->bindParam(":credit",$value,PDO::PARAM_STR);
		$command->bindParam(":currency",$curr,PDO::PARAM_STR);
		//$command->bindParam(":date",date('y-m-d', time()),PDO::PARAM_STR);
		// $command->bindParam(":description",'Penarikan Kas',PDO::PARAM_STR);
		
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