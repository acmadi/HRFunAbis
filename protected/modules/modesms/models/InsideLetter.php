<?php

/**
 * This is the model class for table "esms_inside_letter".
 *
 * The followings are the available columns in table 'esms_inside_letter':
 * @property integer $id
 * @property string $version
 * @property string $version_date
 * @property string $number
 * @property string $subject
 * @property string $content
 * @property string $date
 * @property string $inisiator
 * @property string $ferivicator
 * @property string $to_division
 * @property string $to_company
 * @property string $to_contact
 * @property string $to_position
 * @property string $to_address
 * @property string $created_date
 * @property string $created_by
 */
class InsideLetter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InsideLetter the static model class
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
		return 'esms_inside_letter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number, subject, content, date, to_division, to_company', 'required'),
			array('version', 'length', 'max'=>10),
			array('number, inisiator, ferivicator, to_division, to_company, to_contact, to_position, created_by', 'length', 'max'=>50),
			array('subject, to_address', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, version, version_date, number, subject, content, date, inisiator, ferivicator, to_division, to_company, to_contact, to_position, to_address, created_date, created_by', 'safe', 'on'=>'search'),
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
			'version' => 'Versi',
			'version_date' => 'Tanggal Versi',
			'number' => 'Nomor Surat',
			'subject' => 'Judul Surat',
			'content' => 'Isi Surat',
			'date' => 'tanggal Surat',
			'inisiator' => 'Inisiator',
			'ferivicator' => 'Ferifikator',
			'to_division' => 'Divisi Tujuan',
			'to_company' => 'Perusahaan Tujuan',
			'to_contact' => 'Kontak Tujuan',
			'to_position' => 'Jabatan Tujuan',
			'to_address' => 'Alamat Tujuan',
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
		$criteria->compare('version',$this->version,true);
		$criteria->compare('version_date',$this->version_date,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('inisiator',$this->inisiator,true);
		$criteria->compare('ferivicator',$this->ferivicator,true);
		$criteria->compare('to_division',$this->to_division,true);
		$criteria->compare('to_company',$this->to_company,true);
		$criteria->compare('to_contact',$this->to_contact,true);
		$criteria->compare('to_position',$this->to_position,true);
		$criteria->compare('to_address',$this->to_address,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}