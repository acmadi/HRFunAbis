<?php

/**
 * This is the model class for table "have_fun".
 *
 * The followings are the available columns in table 'have_fun':
 * @property integer $id
 * @property string $title
 * @property string $textOnImage
 * @property string $photoDescription
 * @property string $imagePath
 * @property string $createDate
 */
class HaveFun extends CActiveRecord
{
	public $pageSize=5;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HaveFun the static model class
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
		return 'have_fun';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, imagePath', 'required', 'on'=>'insert,update'),
			array('title', 'length', 'max'=>255, 'on'=>'insert,update'),
			array('textOnImage, photoDescription', 'safe'),
			array('imagePath', 'file','types'=>'jpg, gif, png, bmp', 'allowEmpty'=>true, 'on'=>'update'), // this will allow only specified extension files
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, textOnImage, photoDescription, imagePath, createDate', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'textOnImage' => 'Text On Image',
			'photoDescription' => 'Photo Description',
			'imagePath' => 'Upload Image',
			'createDate' => 'Create Date',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('textOnImage',$this->textOnImage,true);
		$criteria->compare('photoDescription',$this->photoDescription,true);
		$criteria->compare('imagePath',$this->imagePath,true);
		$criteria->compare('createDate',$this->createDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>array('order' => 'createDate DESC',),
			'pagination' => array('pageSize' => $this->pageSize),
		));
	}
}