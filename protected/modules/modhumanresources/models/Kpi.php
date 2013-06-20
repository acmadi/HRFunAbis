<?php

/**
 * This is the model class for table "hr_kpi".
 *
 * The followings are the available columns in table 'hr_kpi':
 * @property integer $id
 * @property string $employee_id
 * @property string $start
 * @property string $finish
 * @property string $sasaran_kerja
 * @property string $bentuk_target
 * @property string $realisasi
 * @property string $bobot
 * @property string $nilai
 * @property string $nilai_kinerja
 * @property string $created_date
 * @property string $update_by
 */
class Kpi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kpi the static model class
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
		return 'hr_kpi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, sasaran_kerja, bentuk_target, realisasi, bobot', 'required'),
			array('employee_id', 'length', 'max'=>20),
			array('bobot, nilai, nilai_kinerja', 'length', 'max'=>11),
			array('update_by', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, start, finish, sasaran_kerja, bentuk_target, realisasi, bobot, nilai, nilai_kinerja, created_date, update_by', 'safe', 'on'=>'search'),
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
			'employee_id' => 'Employee',
			'start' => 'Start',
			'finish' => 'Finish',
			'sasaran_kerja' => 'Sasaran Kerja',
			'bentuk_target' => 'Bentuk Target',
			'realisasi' => 'Realisasi',
			'bobot' => 'Bobot',
			'nilai' => 'Nilai',
			'nilai_kinerja' => 'Nilai Kinerja',
			'created_date' => 'Created Date',
			'update_by' => 'Update By',
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
		$criteria->compare('start',$this->start,true);
		$criteria->compare('finish',$this->finish,true);
		$criteria->compare('sasaran_kerja',$this->sasaran_kerja,true);
		$criteria->compare('bentuk_target',$this->bentuk_target,true);
		$criteria->compare('realisasi',$this->realisasi,true);
		$criteria->compare('bobot',$this->bobot,true);
		$criteria->compare('nilai',$this->nilai,true);
		$criteria->compare('nilai_kinerja',$this->nilai_kinerja,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('update_by',$this->update_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}