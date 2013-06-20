<?php

/**
 * This is the model class for table "esms_outside_letter".
 *
 * The followings are the available columns in table 'esms_outside_letter':
 * @property integer $id
 * @property string $version
 * @property string $version_date
 * @property string $number
 * @property string $subject
 * @property string $summary
 * @property string $date
 * @property string $to
 * @property string $to_division
 * @property string $from_company
 * @property string $from_contact
 * @property string $from_position
 * @property string $file_upload
 * @property string $created_date
 * @property string $created_by
 */
class OutsideLetter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OutsideLetter the static model class
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
		return 'esms_outside_letter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file_upload', 'required'),
			array('version', 'length', 'max'=>10),
			array('date, number, to, to_division, from_company, from_contact, from_position, created_by', 'length', 'max'=>50),
			array('subject, file_upload', 'length', 'max'=>200),
			array('summary', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, version, version_date, number, subject, summary, date, to, to_division, from_company, from_contact, from_position, file_upload, created_date, created_by', 'safe', 'on'=>'search'),
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
			'summary' => 'Ringkasan',
			'date' => 'Tanggal Surat',
			'to' => 'Tujuan Surat',
			'to_division' => 'Divisi Tujuan',
			'from_company' => 'Perusahaan Pengirim',
			'from_contact' => 'Kontak Pengirim',
			'from_position' => 'Jabatan Pengirim',
			'file_upload' => 'Pdf Upload',
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
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('to',$this->to,true);
		$criteria->compare('to_division',$this->to_division,true);
		$criteria->compare('from_company',$this->from_company,true);
		$criteria->compare('from_contact',$this->from_contact,true);
		$criteria->compare('from_position',$this->from_position,true);
		$criteria->compare('file_upload',$this->file_upload,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}