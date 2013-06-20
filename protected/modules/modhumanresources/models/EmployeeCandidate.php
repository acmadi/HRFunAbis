<?php

/**
 * This is the model class for table "hr_rec_employee_candidate".
 *
 * The followings are the available columns in table 'hr_rec_employee_candidate':
 * @property string $candidate_id
 * @property string $name
 * @property string $full_name
 * @property string $pgassol_email
 * @property string $username_server
 * @property string $password_server
 * @property string $department
 * @property string $position
 * @property string $photo
 * @property string $application_status
 * @property string $effective_date
 * @property string $previous_employee_id
 * @property string $gender
 * @property string $place_of_birth
 * @property string $birth_date
 * @property string $religion
 * @property string $blood_type
 * @property string $rhesus
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
class EmployeeCandidate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeeCandidate the static model class
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
		return 'hr_rec_employee_candidate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
			
		return array(
			array('candidate_id, name,', 'required'),
			array('candidate_id, department, position, previous_employee_id, place_of_birth, phone_home, phone_mobile', 'length', 'max'=>20),
			array('name, ktp, passport, driver_licence, jamsostek, npwp, total_work_experience, ', 'length', 'max'=>50),
			array('full_name, address_current_1, address_current_2, address_ktp, cv, certivicate_etc', 'length', 'max'=>200),
			array('photo', 'length', 'max'=>100),
			array('notes', 'length', 'max'=>500),
			array('application_status, last_education, gender, religion, recomendedornot', 'length', 'max'=>10),
			array('blood_type, rhesus', 'length', 'max'=>5),
			array('existing_salary, expected_salary, interview_rate, ', 'numerical'),
			array('candidate_id', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('candidate_id, name, full_name, department, existing_salary, expected_salary, avaliable_start_work_date, position, photo, application_status, previous_employee_id, gender, place_of_birth, birth_date, religion, blood_type, rhesus, ktp, passport, driver_licence, jamsostek, npwp, phone_home, phone_mobile, address_current_1, address_current_2, address_ktp, notes', 'safe', 'on'=>'search'),
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
		'dependents' => array(self::HAS_MANY, 'Dependent', 'candidate_id'),
		'emergency_records' => array(self::HAS_MANY, 'EmergencyRecord', 'candidate_id'),
		'educations' => array(self::HAS_MANY, 'Education', 'candidate_id'),
		'certifications' => array(self::HAS_MANY, 'Certification', 'candidate_id'),
		'jobexperience' => array(self::HAS_MANY, 'JobExperience', 'candidate_id'),
		'interview' => array(self::HAS_MANY, 'Interview', 'candidate_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'candidate_id' => 'Temporary NIP',
			'name' => 'Name',
			'full_name' => 'Full Name',
			'department' => 'Department',
			'position' => 'Job Position',
			'photo' => 'Photo',
			'application_status' => 'Application Status',
			'previous_employee_id' => 'Previous Employee',
			'gender' => 'Gender',
			'place_of_birth' => 'Place Of Birth',
			'birth_date' => 'Birth Date',
			'religion' => 'Religion',
			'blood_type' => 'Blood Type',
			'rhesus' => 'Rhesus',
			'existing_salary' => 'Existing salary',
			'expected_salary' => 'Expected salary',
			'avaliable_start_work_date' => 'Avaliable date work', 
			'ktp' => 'Ktp',
			'passport' => 'Passport',
			'driver_licence' => 'Driver Licence',
			'jamsostek' => 'Jamsostek',
			'npwp' => 'Npwp',
			'phone_home' => 'Phone Home',
			'phone_mobile' => 'Phone Mobile',
			'address_current_1' => 'Address Current 1',
			'address_current_2' => 'Address Current 2',
			'address_ktp' => 'Address Ktp',
			'cv' => 'CV',
			'certivicate_etc' => 'Certification and other',
			'last_education' => 'Last Education',
			'total_work_experience' => 'Total work experience',
			'last_work_area' => 'Last work area',
			'recomendedornot' => 'Recomended or not',
			'notes' => 'Notes',
			'interview_rate' => 'Interview test rate',
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

		$criteria->compare('candidate_id',$this->candidate_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('application_status',$this->application_status,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('place_of_birth',$this->place_of_birth,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('blood_type',$this->blood_type,true);
		$criteria->compare('rhesus',$this->rhesus,true);
		$criteria->compare('existing_salary',$this->existing_salary,true);
		$criteria->compare('expected_salary',$this->expected_salary,true);
		$criteria->compare('avaliable_start_work_date',$this->avaliable_start_work_date,true);
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	//dropdown list
	//1. status
	// const TYPE_1 = 'probation';
	// const TYPE_2 = 'permanent';
	// const TYPE_3 = 'kontrak';

	// public function getStatusOptions()
	// {
		// return array
		// (
			// self::TYPE_1=>'probation',
			// self::TYPE_2=>'permanent',
			// self::TYPE_3=>'kontrak',
		// );
	// }
	
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
	
	//5. application status
	const TYPE_ACCEPT = 'accept';
	const TYPE_REJECT = 'reject';
	const TYPE_PENDING = 'pending';

	public function getApplicationStatusOptions()
	{
		return array
		(
			self::TYPE_ACCEPT=>'accept',
			self::TYPE_REJECT=>'reject',
			self::TYPE_PENDING=>'pending',
		);
	}
	
	//5. recomended or not
	const TYPE_REC = 'recomended';
	const TYPE_NOTREC = 'not recomended';

	public function getRecomendedOptions()
	{
		return array
		(
			self::TYPE_REC=>'recomended',
			self::TYPE_NOTREC=>'not recomended',
		);
	}
	
}