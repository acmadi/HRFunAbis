<?php

/**
 * This is the model class for table "esms_disposisi_tree".
 *
 * The followings are the available columns in table 'esms_disposisi_tree':
 * @property integer $id
 * @property string $employee_id
 * @property string $name
 * @property integer $parent_id
 * @property string $created_by
 * @property string $created_date
 */
class DisposisiTree extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DisposisiTree the static model class
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
		return 'esms_disposisi_tree';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('employee_id', 'length', 'max'=>20),
			array('name, email, created_by', 'length', 'max'=>50),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, name, parent_id, created_by, created_date', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'email' => 'Email',
			'parent_id' => 'Parent',
			'created_by' => 'Created By',
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
		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getChild($employee_id)
	{
		global $ret;
		
		$parent = self::model()->findByAttributes(array('employee_id'=>$employee_id));
		
		$criteria = new CDbCriteria();
		$criteria->addCondition("parent_id = ".$parent->id);//("parent_id = :parent_id");
		//$criteria-> 
		
		$child = self::model()->findAll($criteria);//, array(':parent_id' => $parent->id,));//array('parent_id'=>$parent->id));
		
		return $child;
		// foreach($child as $ch)
		// {
			// $ret = $ret.'#'.$ch->employee_id;
		// }
		// //return $child->employee_id; 
		// return $ret;
	}
	
	public function getName($employee_id)
	{
		$parent = self::model()->findByAttributes(array('employee_id'=>$employee_id));
		
		if(!empty($parent))
			return $parent->name;
		else
			return $employee_id;
	}
	
	public function getEmail($employee_id)
	{
		$parent = self::model()->findByAttributes(array('employee_id'=>$employee_id));
		
		if(!empty($parent))
			return $parent->email;
		else
			return $employee_id;
	}
}