<?php

/**
 * This is the model class for table "prj_document".
 *
 * The followings are the available columns in table 'prj_document':
 * @property integer $id
 * @property string $project_number
 * @property string $type
 * @property string $task_id
 * @property string $document_number
 * @property string $version
 * @property string $version_date
 * @property string $owner
 * @property string $distribution
 * @property string $document_description
 * @property string $file_attached
 * @property string $created_date
 * @property string $created_by
 */
class Document extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Document the static model class
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
		return 'prj_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_number, type, task_id, document_number, version, version_date, owner, distribution, document_description, file_attached', 'required'),
			array('type', 'length', 'max'=>20),
			array('task_id, document_number, owner, created_by', 'length', 'max'=>50),
			array('version', 'length', 'max'=>10),
			array('distribution, file_attached', 'length', 'max'=>200),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_number, type, task_id, document_number, version, version_date, owner, distribution, document_description, file_attached, created_date, created_by', 'safe', 'on'=>'search'),
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
			'project_number' => 'Project Number',
			'type' => 'Type',
			'task_id' => 'Task',
			'document_number' => 'Document Number',
			'version' => 'Version',
			'version_date' => 'Version Date',
			'owner' => 'Owner',
			'distribution' => 'Distribution',
			'document_description' => 'Document Description',
			'file_attached' => 'File Attached',
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
		$criteria->compare('project_number',$this->project_number,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('task_id',$this->task_id,true);
		$criteria->compare('document_number',$this->document_number,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('version_date',$this->version_date,true);
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('distribution',$this->distribution,true);
		$criteria->compare('document_description',$this->document_description,true);
		$criteria->compare('file_attached',$this->file_attached,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}