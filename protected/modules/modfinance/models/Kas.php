<?php

/**
 * This is the model class for table "fin_kas".
 *
 * The followings are the available columns in table 'fin_kas':
 * @property integer $id
 * @property integer $code_kas
 * @property integer $nama_kas
 * @property string $code_proyek
 * @property string $proyek_desc
 */
class Kas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kas the static model class
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
		return 'fin_kas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code_kas, nama_kas, proyek_desc', 'required'),
			array('code_proyek, code_proyek', 'length', 'max'=>20),
			array('proyek_desc, nama_kas', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code_kas, nama_kas, code_proyek, proyek_desc', 'safe', 'on'=>'search'),
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
			'nama_kas' => 'Nama Kas',
			'code_proyek' => 'Code Proyek',
			'proyek_desc' => 'Proyek Desc',
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
		$criteria->compare('code_kas',$this->code_kas);
		$criteria->compare('nama_kas',$this->nama_kas);
		$criteria->compare('code_proyek',$this->code_proyek,true);
		$criteria->compare('proyek_desc',$this->proyek_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getKas($code)
	{
		$data = self::model()->findByAttributes(array('code_kas'=>$code));
		return $data->nama_kas; 
	}
}