<?php

/**
 * This is the model class for table "prj_procurement".
 *
 * The followings are the available columns in table 'prj_procurement':
 * @property integer $id
 * @property string $project_number
 * @property string $vendor
 * @property string $contract
 * @property string $contract_start_date
 * @property string $contract_end_date
 * @property integer $period_month
 * @property string $item
 * @property string $unit_price
 * @property string $amount
 * @property string $total_price
 * @property string $location
 * @property string $created_by
 * @property string $created_date
 */
class Procurement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Procurement the static model class
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
		return 'prj_procurement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_number, vendor, contract, contract_start_date, contract_end_date, period_month, item, unit_price, amount, total_price, location, created_by, created_date', 'required'),
			array('period_month', 'numerical', 'integerOnly'=>true),
			array('project_number, vendor, contract, created_by', 'length', 'max'=>50),
			array('item', 'length', 'max'=>200),
			array('unit_price, amount, total_price', 'length', 'max'=>11),
			array('location', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_number, vendor, contract, contract_start_date, contract_end_date, period_month, item, unit_price, amount, total_price, location, created_by, created_date', 'safe', 'on'=>'search'),
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
			'project_number' => 'Nomor Proyek',
			'vendor' => 'Vendor',
			'contract' => 'Kontrak',
			'contract_start_date' => 'Mulai Kontrak',
			'contract_end_date' => 'Berakhir Kontrak',
			'period_month' => 'Periode Bulan',
			'item' => 'Barang',
			'unit_price' => 'Harga Barang',
			'amount' => 'Jumlah',
			'total_price' => 'Total Harga',
			'location' => 'Lokasi',
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
		$criteria->compare('project_number',Yii::app()->session['project_number'],true);
		$criteria->compare('vendor',$this->vendor,true);
		$criteria->compare('contract',$this->contract,true);
		$criteria->compare('contract_start_date',$this->contract_start_date,true);
		$criteria->compare('contract_end_date',$this->contract_end_date,true);
		$criteria->compare('period_month',$this->period_month);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('unit_price',$this->unit_price,true);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}