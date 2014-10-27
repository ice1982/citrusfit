<?php

/**
 * This is the model class for table "club_halls".
 *
 * The followings are the available columns in table 'club_halls':
 * @property integer $id
 * @property integer $club_id
 * @property string $title
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
 * @property ClubItems $club
 * @property TimeboardItems[] $timeboardItems
 */
class ClubHall extends BaseActiveRecord
{
	public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'club_halls';
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
				'club_id, title, created_username, modified_username',
				'required',
			),
			array(
				'club_id, created_user, modified_user, active',
				'numerical',
				'integerOnly' => true,
			),
			array(
				'title, created_ip, modified_ip, modified_username',
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
				'id, club_id, title, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username, active',
				'safe',
				'on' => 'search'
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
			'club' => array(self::BELONGS_TO, 'ClubItem', 'club_id'),
			'timeboardItems' => array(self::HAS_MANY, 'TimeboardItem', 'hall_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'club_id' => 'Club',
			'title' => 'Title',
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
		$criteria->compare('club_id', $this->club_id);
		$criteria->compare('title', $this->title, true);
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
		));
	}
}
