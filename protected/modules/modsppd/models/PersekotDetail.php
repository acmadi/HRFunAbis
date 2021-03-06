<?php

/**
 * This is the model class for table "sppd_persekot_detail".
 *
 * The followings are the available columns in table 'sppd_persekot_detail':
 * @property integer $id
 * @property integer $parent_id
 * @property string $account_code
 * @property string $description
 * @property integer $debit
 * @property integer $credit
 * @property string $created_date
 * @property string $created_by
 */
class PersekotDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PersekotDetail the static model class
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
		return 'sppd_persekot_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, account_code, description, debit, credit, created_date, created_by', 'required'),
			array('parent_id, debit, credit', 'numerical', 'integerOnly'=>true),
			array('account_code', 'length', 'max'=>6),
			array('created_by', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, account_code, description, debit, credit, created_date, created_by', 'safe', 'on'=>'search'),
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
			'account_code' => 'Kode Akun',
			'description' => 'Uraian',
			'debit' => 'Debet',
			'credit' => 'Kredit',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('account_code',$this->account_code,true);
		$criteria->compare('description',$this->description);
		$criteria->compare('debit',$this->debit);
		$criteria->compare('credit',$this->credit);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getTotalDebit($persekot_id)
	{
		$total = 0;
		$detail = $this->findAllByAttributes(array('parent_id' => $persekot_id));
		foreach ($detail as $data) {
			$total += $data->debit;
		}
		return $total;
	}

	public function getTotalCredit($persekot_id)
	{
		$total = 0;
		$detail = $this->findAllByAttributes(array('parent_id' => $persekot_id));
		foreach ($detail as $data) {
			$total += $data->credit;
		}
		return $total;
	}

	public function createPersekotDetail($persekot_id, $description, $debit, $credit, $name = null)
	{
		$persekotdetail = new PersekotDetail;
		$persekotdetail->parent_id = $persekot_id;
		$persekotdetail->name = $name;
		$persekotdetail->account_code = '-';
		$persekotdetail->description = $description;
		$persekotdetail->debit = $debit;
		$persekotdetail->credit = $credit;
		$persekotdetail->created_date = date('Y-m-d',time());
		$persekotdetail->created_by = 'Dummy';
		$persekotdetail->save();
		return $persekotdetail;
	}
}