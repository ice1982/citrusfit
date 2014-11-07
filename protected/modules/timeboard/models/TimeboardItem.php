<?php

/**
 * This is the model class for table "timeboard_items".
 *
 * The followings are the available columns in table 'timeboard_items':
 * @property integer $id
 * @property integer $hall_id
 * @property integer $instructor_id
 * @property integer $day_of_week
 * @property string $time_start
 * @property string $time_finish
 * @property string $body
 * @property string $created_ip
 * @property string $created_date
 * @property integer $created_user
 * @property string $created_username
 * @property string $modified_ip
 * @property string $modified_date
 * @property integer $modified_user
 * @property string $modified_username
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property ClubHalls $hall
 * @property InstructorItems $instructor
 */
class TimeboardItem extends BaseActiveRecord
{
	public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function behaviors(){
        return array(
            'DatetimeBehavior' => array(
                'class' => 'DatetimeBehavior',
            ),
            'IpBehavior' => array(
                'class' => 'IpBehavior',
            ),
            'UserBehavior' => array(
                'class' => 'UserBehavior',
            ),
            'UsernameBehavior' => array(
                'class' => 'UsernameBehavior',
            ),
        );
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'timeboard_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(
				'hall_id, day_of_week, time_start, time_finish, body, created_username, modified_username',
				'required',
			),
			array(
				'hall_id, instructor_id, day_of_week, created_user, modified_user, active',
				'numerical',
				'integerOnly' => true,
			),
			array(
				'body',
				'length',
				'max' => 500,
			),
			array(
				'created_ip, modified_ip, modified_username',
				'length',
				'max' => 300,
			),
			array(
				'created_username',
				'length',
				'max' => 200,
			),
			array(
				'created_date, modified_date',
				'safe',
			),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(
				'id, hall_id, instructor_id, day_of_week, time_start, time_finish, body, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username, active',
				'safe',
				'on' => 'search',
			),
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
			'hall' => array(self::BELONGS_TO, 'ClubHall', 'hall_id'),
			'instructor' => array(self::BELONGS_TO, 'InstructorItem', 'instructor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hall_id' => 'Hall',
			'instructor_id' => 'Instructor',
			'day_of_week' => 'Day Of Week',
			'time_start' => 'Time Start',
			'time_finish' => 'Time Finish',
			'body' => 'Body',
			'created_ip' => 'Created Ip',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'created_username' => 'Created Username',
			'modified_ip' => 'Modified Ip',
			'modified_date' => 'Modified Date',
			'modified_user' => 'Modified User',
			'modified_username' => 'Modified Username',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('hall_id', $this->hall_id);
		$criteria->compare('instructor_id', $this->instructor_id);
		$criteria->compare('day_of_week', $this->day_of_week);
		$criteria->compare('time_start', $this->time_start, true);
		$criteria->compare('time_finish', $this->time_finish, true);
		$criteria->compare('body', $this->body, true);
		$criteria->compare('created_ip', $this->created_ip, true);
		$criteria->compare('created_date', $this->created_date, true);
		$criteria->compare('created_user', $this->created_user);
		$criteria->compare('created_username', $this->created_username, true);
		$criteria->compare('modified_ip', $this->modified_ip, true);
		$criteria->compare('modified_date', $this->modified_date, true);
		$criteria->compare('modified_user', $this->modified_user);
		$criteria->compare('modified_username', $this->modified_username, true);
		$criteria->compare('active', $this->active);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => array('pageSize' => 50),
			'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
        ));
	}

	public function findAllItemsOfClub($club_id)
	{
		$halls = ClubHall::model()->active()->findAllByAttributes(array('club_id' => $club_id));

		$condition = array('club_id' => $club_id);

		$criteria = new CDbCriteria;

		$criteria->scopes = array('active');

		$params = array();
		foreach ($halls as $key => $hall) {
			$criteria->addCondition('hall_id = :hall_id' . $key, 'OR');
			$params[':hall_id' . $key] = $hall->id;
		}

		$criteria->params = $params;

		$criteria->order = 'hall_id, time_start';

		$model = $this->findAll($criteria);


		return $model;
	}

}
