<?php

/**
 * This is the model class for table "Employee".
 *
 * The followings are the available columns in table 'Employee':
 * @property string $employee_id
 * @property string $name
 * @property string $full_name
 * @property string $pgassol_email
 * @property string $department
 * @property string $position
 * @property string $photo
 * @property string $date_employee
 * @property string $employee_status
 * @property string $effective_date
 * @property string $previous_employee_id
 * @property string $gender
 * @property string $place_of_birth
 * @property string $birth_date
 * @property string $religion
 * @property string $blood_type
 * @property string $marital_status
 * @property string $number_of_dependent
 * @property string $ktp
 * @property string $passport
 * @property string $driver_licence
 * @property string $jamsostek
 * @property string $npwp
 * @property string $phone_home
 * @property string $phone_mobile
 * @property string $address_current_1
 * @property string $address_current_2
 * @property string $address_ktp
 * @property string $private_email
 */
class Employee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Employee the static model class
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
		return 'hr_employee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, name, full_name, date_employee, gender, place_of_birth, birth_date, religion, marital_status,ktp', 'required'),
			array('employee_id,  department, position, previous_employee_id, place_of_birth, phone_home, phone_mobile', 'length', 'max'=>20),
			array('name, pgassol_email, ktp, photo, passport, driver_licence, jamsostek, npwp, private_email', 'length', 'max'=>50),
			array('pgassol_email, private_email', 'email'),
			array('full_name, address_current_1, address_current_2, address_ktp', 'length', 'max'=>200),
			array('employee_status, gender, religion', 'length', 'max'=>10),
			array('marital_status', 'length', 'max'=>20),
			array('number_of_dependent', 'numerical'),
			array('blood_type', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_id, name, full_name, pgassol_email,  department, position, photo, date_employee, employee_status, effective_date, previous_employee_id, gender, place_of_birth, birth_date, religion, blood_type, ktp, passport, driver_licence, jamsostek, npwp, phone_home, phone_mobile, address_current_1, address_current_2, address_ktp, private_email', 'safe', 'on'=>'search'),
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
		'dependents' => array(self::HAS_MANY, 'Dependent', 'employee_id'),
		'emergency_records' => array(self::HAS_MANY, 'EmergencyRecord', 'employee_id'),
		'educations' => array(self::HAS_MANY, 'Education', 'employee_id'),
		'certifications' => array(self::HAS_MANY, 'Certification', 'employee_id'),
		'jobexperience' => array(self::HAS_MANY, 'JobExperience', 'employee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_id' => 'NIPG',
			'name' => 'Kode Nama',
			'full_name' => 'Nama lengkap',
			'pgassol_email' => 'Email PGN Solution',
			'department' => 'Department',
			'position' => 'Posisi',
			'photo' => 'photo',
			'date_employee' => 'Taggal Mulai Kerja',
			'employee_status' => 'Status Kepegawaian',
			'effective_date' => 'Effective Date',
			'previous_employee_id' => 'Previous Employee',
			'gender' => 'Jenis Kelamin',
			'place_of_birth' => 'Tempat Lahir',
			'birth_date' => 'Tanggal Lahir',
			'religion' => 'Agama',
			'blood_type' => 'Golongan Darah',
			'marital_status' => 'Status Pernikahan',
			'number_of_dependent' => 'Jumlah Tanggungan',
			'ktp' => 'Ktp',
			'passport' => 'Passport',
			'driver_licence' => 'SIM',
			'jamsostek' => 'Jamsostek',
			'npwp' => 'NPWP',
			'phone_home' => 'Telepon Rumah',
			'phone_mobile' => 'Handphone',
			'address_current_1' => 'Alamat 1',
			'address_current_2' => 'Alamat 2',
			'address_ktp' => 'Alamat Ktp',
			'private_email' => 'Email Pribadi',
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

		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('pgassol_email',$this->pgassol_email,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('date_employee',$this->date_employee,true);
		$criteria->compare('employee_status',$this->employee_status,true);
		$criteria->compare('effective_date',$this->effective_date,true);
		$criteria->compare('previous_employee_id',$this->previous_employee_id,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('place_of_birth',$this->place_of_birth,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('blood_type',$this->blood_type,true);
		$criteria->compare('ktp',$this->ktp,true);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('driver_licence',$this->driver_licence,true);
		$criteria->compare('jamsostek',$this->jamsostek,true);
		$criteria->compare('npwp',$this->npwp,true);
		$criteria->compare('phone_home',$this->phone_home,true);
		$criteria->compare('phone_mobile',$this->phone_mobile,true);
		$criteria->compare('address_current_1',$this->address_current_1,true);
		$criteria->compare('address_current_2',$this->address_current_2,true);
		$criteria->compare('address_ktp',$this->address_ktp,true);
		$criteria->compare('private_email',$this->private_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//dropdown list
	//1. status
	const TYPE_1 = 'probation';
	const TYPE_2 = 'permanent';
	const TYPE_3 = 'kontrak';

	public function getStatusOptions()
	{
		return array
		(
			self::TYPE_1=>'probation',
			self::TYPE_2=>'permanent',
			self::TYPE_3=>'kontrak',
		);
	}
	
	//2. gender
	const TYPE_M = 'male';
	const TYPE_F = 'female';

	public function getGenderOptions()
	{
		return array
		(
			self::TYPE_M=>'male',
			self::TYPE_F=>'female',
		);
	}
	
	//3. religion
	const TYPE_I = 'islam';
	const TYPE_K = 'kristen';
	const TYPE_KK = 'katolik';
	const TYPE_H = 'hindu';
	const TYPE_B = 'buda';
	const TYPE_O = 'other';

	public function getReligionOptions()
	{
		return array
		(
			self::TYPE_I => 'islam',
			self::TYPE_K => 'kristen',
			self::TYPE_KK => 'katolik',
			self::TYPE_H => 'hindu',
			self::TYPE_B => 'buda',
			self::TYPE_O => 'other',
		);
	}
	
	//4. blod type
	const TYPE_A = 'A';
	const TYPE_BB = 'B';
	const TYPE_AB = 'AB';
	const TYPE_OO = 'O';

	public function getBloodOptions()
	{
		return array
		(
			self::TYPE_A=>'A',
			self::TYPE_BB=>'B',
			self::TYPE_AB=>'AB',
			self::TYPE_OO=>'O',
		);
	}
	
	//5. marital_status
	const TYPE_S = 'Single';
	const TYPE_MR = 'Married';
	const TYPE_DJ = 'Duda/Janda';
	
	public function getMaritalOptions()
	{
		return array
		(
			self::TYPE_S=>'Single',
			self::TYPE_MR=>'Married',
			self::TYPE_DJ=>'Duda/Janda',
		);
	}
	
	public static function getPhoto($employee_id)
	{
		$data = self::model()->findByAttributes(array('employee_id'=>$employee_id));
		
		return $data->photo;
	}
	
	public static function getName($employee_id)
	{
		$data = self::model()->findByAttributes(array('employee_id'=>$employee_id));
		
		return $data->full_name;
	}
	
	public static function getEmail($employee_id)
	{
		$data = self::model()->findByAttributes(array('employee_id'=>$employee_id));
		
		return $data->pgassol_email;
	}
	
	// public function suggestEmployee($keyword,$limit=20)
	// {
		// $models=$this->findAll(array(
			// 'condition'=>'full_name LIKE :keyword',
			// 'order'=>'name',
			// 'limit'=>$limit,
			// 'params'=>array(':keyword'=>"%$keyword%")
		// ));
		// $suggest=array();
		// foreach($models as $model) {
			// $suggest[] = array(
				// 'label'=>$model->full_name.' - '.$model->employee_id,  // label for dropdown list
				// 'value'=>$model->full_name,  // value for input field
				// 'full_name'=>$model->full_name,       // return values from autocomplete
				// 'date_of_hire'=>$model->birth_date,
				// 'number_of_dependent'=>2,
			// );
		// }
		// return $suggest;
	// }
}