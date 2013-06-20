<?php

/**
 * This is the model class for table "hr_file_publication".
 *
 * The followings are the available columns in table 'hr_file_publication':
 * @property integer $id
 * @property string $name
 * @property string $version
 * @property string $version_date
 * @property string $file_upload
 * @property string $craeted_by
 * @property string $created_date
 */
class FilePublication extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FilePublication the static model class
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
		return 'hr_file_publication';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, file_upload', 'required'),
			array('name, file_upload', 'length', 'max'=>200),
			array('version', 'length', 'max'=>10),
			array('craeted_by', 'length', 'max'=>50),
			array('version_date, created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, version, version_date, file_upload, craeted_by, created_date', 'safe', 'on'=>'search'),
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
			'name' => 'Nama File',
			'version' => 'Versi',
			'version_date' => 'Tanggal Versi',
			'file_upload' => 'File',
			'craeted_by' => 'Craeted By',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('version_date',$this->version_date,true);
		$criteria->compare('file_upload',$this->file_upload,true);
		$criteria->compare('craeted_by',$this->craeted_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}