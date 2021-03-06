<?php

/**
 * This is the model class for table "prj_finance".
 *
 * The followings are the available columns in table 'prj_finance':
 * @property integer $id
 * @property string $project_number
 * @property string $elbi
 * @property string $elbi_desc
 * @property string $period_month
 * @property string $debit
 * @property string $credit
 * @property string $remarks
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
			array('project_number, elbi, period_month, debit, credit, remarks', 'required'),
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
		$criteria->compare('project_number',Yii::app()->session['project_number'],true);
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
	
	//dropdown list
	//period-month
	const TYPE_1 = 'Januari';
	const TYPE_2 = 'Februari';
	const TYPE_3 = 'Maret';
	const TYPE_4 = 'April';
	const TYPE_5 = 'Mei';
	const TYPE_6 = 'Juni';
	const TYPE_7 = 'Juli';
	const TYPE_8 = 'Agustus';
	const TYPE_9 = 'September';
	const TYPE_10 = 'Oktober';
	const TYPE_11 = 'November';
	const TYPE_12 = 'Desember';
	
	public function getPeriodOptions()
	{
		return array
		(
			self::TYPE_1=>'Januari',
			self::TYPE_2=>'Februari',
			self::TYPE_3=>'Maret',
			self::TYPE_4=>'April',
			self::TYPE_5=>'Mei',
			self::TYPE_6=>'Juni',
			self::TYPE_7=>'Juli',
			self::TYPE_8=>'Agustus',
			self::TYPE_9=>'September',
			self::TYPE_10=>'Oktober',
			self::TYPE_11=>'November',
			self::TYPE_12=>'Desember',
		);
	}

	public function getTotalDebit()
	{
		$finances = $this->findAllByAttributes(array('project_number'=>Yii::app()->session['project_number']));
		$total = 0;
		foreach ($finances as $finance) {
			$total += $finance->debit;
		}
		return $total;
	}

	public function getTotalCredit()
	{
		$finances = $this->findAllByAttributes(array('project_number'=>Yii::app()->session['project_number']));
		$total = 0;
		foreach ($finances as $finance) {
			$total += $finance->credit;
		}
		return $total;
	}
}