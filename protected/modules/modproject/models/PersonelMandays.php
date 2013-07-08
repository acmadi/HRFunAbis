<?php

/**
 * This is the model class for table "prj_personel_mandays".
 *
 * The followings are the available columns in table 'prj_personel_mandays':
 * @property integer $id
 * @property string $employee_id
 * @property string $project_number
 * @property string $month
 * @property integer $year
 * @property integer $mandays
 */
class PersonelMandays extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PersonelMandays the static model class
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
		return 'prj_personel_mandays';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, project_number, month, mandays', 'required'),
			array('year, mandays', 'numerical', 'integerOnly'=>true),
			array('employee_id, project_number', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, project_number, month, mandays', 'safe', 'on'=>'search'),
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
			'employee_id' => 'ID Pegawai',
			'project_number' => 'Nomor Proyek',
			'month' => 'Bulan',
			'year' => 'Tahun',
			'mandays' => 'Hari Kerja',
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
		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('project_number',$this->project_number,true);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('mandays',$this->mandays);

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
	
	public function getMonth($month)
	{
		if ($month == "1")
			return 'Januari';
		if ($month == "2")
			return 'Februari';
		if ($month == "3")
			return 'Maret';
		if ($month == "4")
			return 'April';
		if ($month == "5")
			return 'Mei';
		if ($month == "6")
			return 'Juni';
		if ($month == "7")
			return 'Juli';
		if ($month == "8")
			return 'Agustus';
		if ($month == "9")
			return 'September';
		if ($month == "10")
			return 'Oktober';
		if ($month == "11")
			return 'November';
		if ($month == "12")
			return 'Desember';		
	}

	public function getTotalMandays($employee_id)
	{
		$personel = self::model()->findAllByAttributes(array('employee_id'=>$employee_id));
		$total_mandays = 0;
		foreach ($personel as $person) {
			$total_mandays += $person->mandays;
		}
		return $total_mandays;
	}

	public function getAllMandays($id)
	{
		$personel = self::model()->findAllByAttributes(array('employee_id'=>$id));
		return $personel;
	}
}