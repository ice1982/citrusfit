<?php

/**
 * This is the model class for table "club_items".
 *
 * The followings are the available columns in table 'club_items':
 * @property integer $id
 * @property string $title
 * @property string $annotation
 * @property string $description
 * @property string $body
 * @property string $contact_phones
 * @property string $contact_address
 * @property string $contact_info
 * @property string $contact_coordinates
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
 * @property Banners[] $banners
 * @property CatalogItems[] $catalogItems
 * @property ClubHalls[] $clubHalls
 * @property FormRequests[] $formRequests
 * @property Pages[] $pages
 */
class ClubItem extends BaseActiveRecord
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
		return 'club_items';
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
				'title',
				'required',
			),
			array(
				'manager_email',
				'required',
			),
			array(
                'manager_email',
                'length',
                'max' => 100,
            ),
            array(
                'manager_email',
                'email',
            ),
			array(
				'created_user, modified_user, active',
				'numerical',
				'integerOnly' => true,
			),
			array(
				'title, contact_phones, created_ip, modified_ip, modified_username',
				'length',
				'max' => 300,
			),
			array(
				'contact_address',
				'length',
				'max' => 500,
			),
            array(
                'annotation',
                'length',
                'max' => 500,
            ),
			array(
				'created_username',
				'length',
				'max' => 200,
			),
			array(
				'title, annotation, description, body, contact_phones, contact_address, contact_info, contact_coordinates',
				'safe',
			),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, annotation, description, body, contact_phones, contact_address, contact_info, contact_coordinates, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username, active',
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
			'banners' => array(self::HAS_MANY, 'Banner', 'club_id'),
			'catalogItems' => array(self::HAS_MANY, 'CatalogItem', 'club_id'),
			'clubHalls' => array(self::HAS_MANY, 'ClubHall', 'club_id'),
			'formRequests' => array(self::HAS_MANY, 'FormRequest', 'club_id'),
			'pages' => array(self::HAS_MANY, 'Page', 'club_id'),
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
            'annotation' => 'Annotation',
			'description' => 'Description',
			'body' => 'Body',
			'manager_email' => 'Email',
			'contact_phones' => 'Contact Phones',
			'contact_address' => 'Contact Address',
			'contact_info' => 'Contact Info',
			'contact_coordinates' => 'Contact coordinates',
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
		$criteria->compare('title', $this->title, true);
		$criteria->compare('manager_email', $this->manager_email, true);
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

	public function switchClub($id)
	{
		Yii::app()->session['club'] = $id;
	}

	public function getClubsList()
	{
		$models = $this->active()->findAll(array('order' => 'title'));

		$list = CHtml::listData($models, 'id', function($model) {
			return CHtml::decode($model->title . ' (' . $model->contact_address . ')');
		});

		return $list;
	}
}
