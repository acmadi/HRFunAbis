<?php

/**
 * This is the model class for table "fin_kas_saldo".
 *
 * The followings are the available columns in table 'fin_kas_saldo':
 * @property integer $id
 * @property string $code_kas
 * @property string $akumulasi_saldo
 * @property string $transaksi
 * @property string $description
 * @property string $date
 * @property string $created_by
 * @property string $created_date
 */
class KasSaldo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KasSaldo the static model class
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
		return 'fin_kas_saldo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code_kas, akumulasi_saldo, transaksi, description, date', 'required'),
			array('code_kas', 'length', 'max'=>20),
			array('akumulasi_saldo, transaksi', 'length', 'max'=>11),
			array('description', 'length', 'max'=>200),
			array('created_by', 'length', 'max'=>50),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code_kas, akumulasi_saldo, transaksi, description, date, created_by, created_date', 'safe', 'on'=>'search'),
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
			'akumulasi_saldo' => 'Akumulasi Saldo',
			'transaksi' => 'Transaksi',
			'description' => 'Description',
			'date' => 'Date',
			'transac_date' => 'Tanggal Transaksi',
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
		$criteria->compare('code_kas',$this->code_kas,true);
		$criteria->compare('akumulasi_saldo',$this->akumulasi_saldo,true);
		$criteria->compare('transaksi',$this->transaksi,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
			'criteria'=>$criteria,
		));
	}
	
	public function getLastAkumulasiSaldo($code_kas)
	{
		$data = self::model()->findByAttributes(array('code_kas'=>$code_kas), array('order'=>'id DESC'));
		if(empty($data))
			return 0;
		else
			return $data->akumulasi_saldo; 
	}
	
	public function createSaldo($code_kas, $last_saldo, $amount, $transaction, $transac_date)
	{
		$sql="INSERT INTO `fin_kas_saldo`
					  (`id`, `code_kas`, `akumulasi_saldo`,`transaksi`, `description`, `date`, `transac_date`) 
				VALUES(NULL, :code_kas, :akumulasi_saldo, :transaksi, :description, :date, :transac_date)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$date_time =  date("Y-m-d H:i:s", time());
		
		$command->bindParam(":code_kas",$code_kas,PDO::PARAM_STR);
		$command->bindParam(":akumulasi_saldo",$last_saldo,PDO::PARAM_STR);
		$command->bindParam(":transaksi",$amount,PDO::PARAM_STR);
		$command->bindParam(":description",$transaction,PDO::PARAM_STR);
		$command->bindParam(":date",$date_time,PDO::PARAM_STR);
		$command->bindParam(":transac_date",$transac_date,PDO::PARAM_STR);

		$command->execute();	
	}
}