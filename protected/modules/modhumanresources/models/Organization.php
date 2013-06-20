<?php

/**
 * This is the model class for table "menu_nested".
 *
 * The followings are the available columns in table 'menu_nested':
 * @property string $id
 * @property string $title
 * @property string $lft
 * @property string $url
 * @property integer $visible
 * @property string $task
 */
class Organization extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Organization the static model class
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
		return 'hr_organization';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year,title, pic', 'required'),
			array('year, visible', 'numerical', 'integerOnly'=>true),
			array('title, url', 'length', 'max'=>255),
			array('lft, rgt', 'length', 'max'=>10),
			array('task', 'length', 'max'=>64),
			array('pic', 'length','max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, lft, rgt, url, visible, task, pic', 'safe', 'on'=>'search'),
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
			'year' => 'Year',
			'title' => 'Title',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'url' => 'Url',
			'visible' => 'Visible',
			'task' => 'Task',
			'pic' => 'PIC',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('lft',$this->lft,true);
		$criteria->compare('rgt',$this->rgt,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('task',$this->task,true);
		$criteria->compare('pic',$this->pic,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	const Y_1 = '2008';
	const Y_2 = '2009';
	const Y_3 = '2010';
	const Y_4 = '2011';
	const Y_5 = '2012';
	const Y_6 = '2013';
	const Y_7 = '2014';
	const Y_8 = '2015';
	const Y_9 = '2016';
	
	public function getYears()
	{
		return array
		(
			self::Y_1=>'2008',
			self::Y_2=>'2009',
			self::Y_3=>'2010',
			self::Y_4=>'2011',
			self::Y_5=>'2012',
			self::Y_6=>'2013',
			self::Y_7=>'2014',
			self::Y_8=>'2015',
			self::Y_9=>'2016',
		);
	}
}