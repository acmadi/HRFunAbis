<?php

/**
 * This is the model class for table "sppd_attachment".
 *
 * The followings are the available columns in table 'sppd_attachment':
 * @property integer $id
 * @property integer $sppd_id
 * @property string $name
 * @property string $type
 * @property string $attachment
 * @property string $created_date
 * @property string $created_by
 */
class Attachment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attachment the static model class
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
		return 'sppd_attachment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sppd_id, name, type, attachment, created_date, created_by', 'required'),
			array('sppd_id', 'numerical', 'integerOnly'=>true),
			array('name, created_by', 'length', 'max'=>50),
			array('type', 'length', 'max'=>20),
			array('attachment', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sppd_id, name, type, attachment', 'safe', 'on'=>'search'),
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
			'sppd_id' => 'Sppd',
			'name' => 'Nama',
			'type' => 'Tipe',
			'attachment' => 'Lampiran',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('attachment',$this->attachment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	const TYPE_1 = 'BBM';
	const TYPE_2 = 'TOL';
	const TYPE_3 = 'TELEPON';
	const TYPE_4 = 'OBAT';
	const TYPE_5 = 'MAKAN';
	const TYPE_6 = 'JAMUAN';
	const TYPE_7 = 'LAINNYA';

	public function getType()
	{
		return array(
			self::TYPE_1 => 'BBM',
			self::TYPE_2 => 'TOL',
			self::TYPE_3 => 'TELEPON',
			self::TYPE_4 => 'OBAT',
			self::TYPE_5 => 'MAKAN',
			self::TYPE_6 => 'JAMUAN',
			self::TYPE_7 => 'LAINNYA',
			);
	}

}