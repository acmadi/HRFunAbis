<?php

/**
 * This is the model class for table "prj_finance".
 *
 * The followings are the available columns in table 'prj_finance':
 * @property integer $id
 * @property string $project_number
 * @property string $elbi
 * @property string $elbi_desc
 * @property integer $period_month
 * @property string $debit
 * @property string $credit
 * @property integer $remarks
 * @property string $created_by
 * @property string $created_date
 */
class Finance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Finance the static model class
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
		return 'prj_finance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_number, elbi, elbi_desc, period_month, debit, credit, remarks', 'required'),
			array('period_month, remarks', 'numerical', 'integerOnly'=>true),
			array('project_number, created_by', 'length', 'max'=>50),
			array('elbi', 'length', 'max'=>20),
			array('elbi_desc', 'length', 'max'=>100),
			array('debit, credit', 'length', 'max'=>11),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_number, elbi, elbi_desc, period_month, debit, credit, remarks, created_by, created_date', 'safe', 'on'=>'search'),
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
			'elbi' => 'Elbi',
			'elbi_desc' => 'Deskripsi Elbi',
			'period_month' => 'Periode Bulan',
			'debit' => 'Debit',
			'credit' => 'Kredit',
			'remarks' => 'Keterangan',
			'created_by' => 'Dibuat oleh',
			'created_date' => 'Tanggal Dibuat',
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
		$criteria->compare('project_number',$this->project_number,true);
		$criteria->compare('elbi',$this->elbi,true);
		$criteria->compare('elbi_desc',$this->elbi_desc,true);
		$criteria->compare('period_month',$this->period_month);
		$criteria->compare('debit',$this->debit,true);
		$criteria->compare('credit',$this->credit,true);
		$criteria->compare('remarks',$this->remarks);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}