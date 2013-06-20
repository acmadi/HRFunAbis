<?php

/**
 * This is the model class for table "fin_period".
 *
 * The followings are the available columns in table 'fin_period':
 * @property integer $id
 * @property string $period_tag
 * @property string $period_start
 * @property string $period_finish
 */
class Period extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Period the static model class
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
		return 'fin_period';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('period_tag, period_start, period_finish', 'required'),
			array('period_tag', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, period_tag, period_start, period_finish', 'safe', 'on'=>'search'),
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
			'period_tag' => 'Period Tag',
			'period_start' => 'Period Start',
			'period_finish' => 'Period Finish',
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
		$criteria->compare('period_tag',$this->period_tag,true);
		$criteria->compare('period_start',$this->period_start,true);
		$criteria->compare('period_finish',$this->period_finish,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}