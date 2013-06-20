<?php

/**
 * This is the model class for table "fin_rekening_saldo".
 *
 * The followings are the available columns in table 'fin_rekening_saldo':
 * @property integer $id
 * @property string $nomor_rek
 * @property string $akumulasi_saldo
 * @property string $transaksi
 * @property string $description
 * @property string $date
 * @property string $created_by
 * @property string $created_date
 */
class RekeningSaldo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RekeningSaldo the static model class
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
		return 'fin_rekening_saldo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nomor_rek, akumulasi_saldo, transaksi, description,transac_date, date', 'required'),
			array('nomor_rek', 'length', 'max'=>20),
			array('akumulasi_saldo, transaksi', 'length', 'max'=>11),
			array('description', 'length', 'max'=>200),
			array('created_by', 'length', 'max'=>50),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nomor_rek, akumulasi_saldo, transaksi, description, date, created_by, created_date', 'safe', 'on'=>'search'),
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
			'nomor_rek' => 'Nomor Rek',
			'akumulasi_saldo' => 'Akumulasi Saldo',
			'transaksi' => 'Transaksi',
			'description' => 'Keterangan',
			'transac_date' => 'Tanggal Transaksi',
			'date' => 'Date',
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
		$criteria->compare('nomor_rek',$this->nomor_rek,true);
		$criteria->compare('akumulasi_saldo',$this->akumulasi_saldo,true);
		$criteria->compare('transaksi',$this->transaksi,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
		));
	}
	
	public function getLastAkumulasiSaldo($nomor_rek)
	{
		$data = self::model()->findByAttributes(array('nomor_rek'=>$nomor_rek), array('order'=>'id DESC'));
		if(empty($data))
			return 0;
		else
			return $data->akumulasi_saldo; 
	}
	
	public function getNearestAkumulasiSaldo($nomor_rek, $date)
	{
		$data = self::model()->findAll(array('condition'=>'nomor_rek=: AND date <= :date', 'param'=>array(':nomor_rek'=>$nomor_rek, ':date'=>$date)), array('order'=>'id DESC'));
		if(empty($data))
			return 0;
		else
			return $data->akumulasi_saldo; 
	}
	
	public function updateSaldo($id, $old_debit, $old_credit)
	{
		$rek = RekeningDc::model()->findByPk($id);
		
		//sesuaikan saldo 
		if($old_debit > 0)
		{
			//get akumulasi saldo 
			$last_saldo = $this->getLastAkumulasiSaldo($rek->nomor_rek);
			$saldo = $last_saldo - $old_debit;
			
			$this->createSaldo($rek->nomor_rek, $saldo, -($old_debit), $rek->description, $rek->date);
		}
		if($old_credit > 0)
		{
			//get akumulasi saldo 
			$last_saldo = $this->getLastAkumulasiSaldo($rek->nomor_rek);
			$saldo = $last_saldo + $old_credit;
			
			$this->createSaldo($rek->nomor_rek, $saldo, $old_credit, $rek->description, $rek->date);
		}
		
		if($rek->debit > 0)
		{
			//get akumulasi saldo 
			$last_saldo = $this->getLastAkumulasiSaldo($rek->nomor_rek);
			$saldo = $last_saldo + $rek->debit;
			
			$this->createSaldo($rek->nomor_rek, $saldo, $rek->debit, $rek->description, $rek->date);
		}
		if($rek->credit > 0)
		{
			//get akumulasi saldo 
			$last_saldo = $this->getLastAkumulasiSaldo($rek->nomor_rek);
			$saldo = $last_saldo - $rek->credit;
			
			$this->createSaldo($rek->nomor_rek, $saldo, -($rek->credit), $rek->description, $rek->date);
		}
		//end sesuaikan saldo
	
	}
	
	public function createSaldo($nomor_rek, $last_saldo, $amount, $description, $transac_date)
	{
		$sql="INSERT INTO `fin_rekening_saldo`
					  (`id`, `nomor_rek`, `akumulasi_saldo`,`transaksi`, `description`, `transac_date`, `date`) 
				VALUES(NULL, :nomor_rek, :akumulasi_saldo, :transaksi, :description, :transac_date, :date)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$date_time =  date("Y-m-d H:i:s", time());
		
		$command->bindParam(":nomor_rek",$nomor_rek,PDO::PARAM_STR);
		$command->bindParam(":akumulasi_saldo",$last_saldo,PDO::PARAM_STR);
		$command->bindParam(":transaksi",$amount,PDO::PARAM_STR);
		$command->bindParam(":description",$description,PDO::PARAM_STR);
		$command->bindParam(":transac_date",$transac_date,PDO::PARAM_STR);
		$command->bindParam(":date",$date_time,PDO::PARAM_STR);

		$command->execute();	
	}
	
	
}