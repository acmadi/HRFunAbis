<?php

/**
 * This is the model class for table "fin_rekening".
 *
 * The followings are the available columns in table 'fin_rekening':
 * @property integer $id
 * @property string $akun
 * @property string $nomor_rek
 * @property string $bank
 */
class Rekening extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rekening the static model class
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
		return 'fin_rekening';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('akun, nomor_rek, bank', 'required'),
			array('akun, nomor_rek', 'length', 'max'=>20),
			array('bank', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, akun, nomor_rek, bank', 'safe', 'on'=>'search'),
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
			'akun' => 'Akun',
			'nomor_rek' => 'Nomor Rek',
			'bank' => 'Bank',
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
		$criteria->compare('nomor_rek',$this->nomor_rek,true);
		$criteria->compare('bank',$this->bank,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getAkun($code)
	{
		$data = self::model()->findByAttributes(array('nomor_rek'=>$code));
		return $data->akun; 
	}

	public function getKodePembantu($code)
	{
		$data = self::model()->findByAttributes(array('nomor_rek'=>$code));
		return $data->kode_pembantu; 
	}
	
	public function getBank($code)
	{
		$data = self::model()->findByAttributes(array('nomor_rek'=>$code));
		return $data->bank; 
	}
}