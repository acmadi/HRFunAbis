<?php

/**
 * This is the model class for table "sppd_form_persekot".
 *
 * The followings are the available columns in table 'sppd_form_persekot':
 * @property integer $id
 * @property integer $sppd_id
 * @property string $paid_to
 * @property string $received_from
 * @property integer $amount
 * @property string $amount_in_words
 * @property string $check_giro_date
 * @property string $check_giro_number
 * @property string $currency_code
 * @property string $bank_code
 * @property string $journal_number
 * @property string $voucher_number
 * @property string $voucher_date
 * @property string $notes
 * @property string $flag
 * @property string $created_by
 * @property string $created_date
 */
class Persekot extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Persekot the static model class
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
		return 'sppd_form_persekot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sppd_id, paid_to, received_from, amount, amount_in_words, check_giro_date, check_giro_number, currency_code, bank_code, journal_number, voucher_number, voucher_date, notes, flag, created_by, created_date', 'required'),
			array('sppd_id, amount', 'numerical', 'integerOnly'=>true),
			array('paid_to, received_from, created_by', 'length', 'max'=>50),
			array('check_giro_number, journal_number, voucher_number', 'length', 'max'=>20),
			array('currency_code, bank_code', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sppd_id, paid_to, received_from, amount, amount_in_words, check_giro_date, check_giro_number, currency_code, bank_code, journal_number, voucher_number, voucher_date, created_by, created_date', 'safe', 'on'=>'search'),
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
			'sppd_id' => 'SPPD',
			'paid_to' => 'Dibayar Kepada',
			'received_from' => 'Diterima Dari',
			'amount' => 'Sejumlah',
			'amount_in_words' => 'Terbilang',
			'check_giro_date' => 'Tanggal Cek/Giro',
			'check_giro_number' => 'Nomor Cek/Giro',
			'currency_code' => 'Kode Valuta',
			'bank_code' => 'Kode Bank',
			'journal_number' => 'Nomor Jurnal',
			'voucher_number' => 'Nomor Voucher',
			'voucher_date' => 'Tanggal Voucher',
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
		$criteria->compare('sppd_id',$this->sppd_id);
		$criteria->compare('paid_to',$this->paid_to,true);
		$criteria->compare('received_from',$this->received_from,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('amount_in_words',$this->amount_in_words,true);
		$criteria->compare('check_giro_date',$this->check_giro_date,true);
		$criteria->compare('check_giro_number',$this->check_giro_number,true);
		$criteria->compare('currency_code',$this->currency_code,true);
		$criteria->compare('bank_code',$this->bank_code,true);
		$criteria->compare('journal_number',$this->journal_number,true);
		$criteria->compare('voucher_number',$this->voucher_number,true);
		$criteria->compare('voucher_date',$this->voucher_date,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('flag',$this->flag,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function updateAmount()
	{
		$debit = PersekotDetail::model()->getTotalDebit($this->id);
		$credit = PersekotDetail::model()->getTotalCredit($this->id);
		$this->amount = abs($debit-$credit);
		$this->save();

	}

	public function createPersekot($sppd_id, $flag)
	{
		$model = Form::model()->findByPk($sppd_id);
		$persekot = new Persekot;
		$persekot->sppd_id = $model->id;
		$persekot->paid_to = $model->name;
		$persekot->received_from = '-';
		$persekot->amount = ($model->sppd_type == 'Dinas')?RABDinas::model()->getTotal($sppd_id):RABNonDinas::model()->getTotal($sppd_id);
		$persekot->amount_in_words = '-';
		$persekot->check_giro_date = date('Y-m-d',time());
		$persekot->check_giro_number = '-';
		$persekot->currency_code = '-';
		$persekot->bank_code = '-';
		$persekot->journal_number = '-';
		$persekot->voucher_number = '-';
		$persekot->notes = '-';
		$persekot->flag = $flag;
		$persekot->voucher_date = date('Y-m-d',time());
		$persekot->created_date = date('Y-m-d',time());
		$persekot->created_by = 'Dummy';
		$persekot->save();
		return $persekot;
	}
}