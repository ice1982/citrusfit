<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $role
 * @property string $created_ip
 * @property string $created_date
 * @property integer $created_user
 * @property string $created_username
 * @property string $modified_ip
 * @property string $modified_date
 * @property integer $modified_user
 * @property string $modified_username
 */
class User extends BaseActiveRecord
{
	const ROLE_BANNED = 0;
	const ROLE_GLOBAL_ADMIN = 1;
	const ROLE_GLOBAL_MANAGER = 2;

    public $roles = array();

    public function init()
    {
        parent::init();

        $this->roles = array(
			self::ROLE_GLOBAL_ADMIN => 'Админ сети',
			self::ROLE_GLOBAL_MANAGER => 'Менеджер сети',
			self::ROLE_BANNED => 'Неактивный',
        );
    }


	public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
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
				'username',
				'required',
			),
			array(
				'password',
				'required',
				'on' => 'insert',
			),
			array(
				'role, created_user, modified_user',
				'numerical',
				'integerOnly' => true,
			),
			array(
				'username',
				'length',
				'max' => 50,
			),
			array(
				'password',
				'length',
				'max' => 200,
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
				'id, username, password, role, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username',
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

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'role' => 'Role',
			'created_ip' => 'Created Ip',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'created_username' => 'Created Username',
			'modified_ip' => 'Modified Ip',
			'modified_date' => 'Modified Date',
			'modified_user' => 'Modified User',
			'modified_username' => 'Modified Username',
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
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('role', $this->role);
		$criteria->compare('created_ip', $this->created_ip, true);
		$criteria->compare('created_date', $this->created_date, true);
		$criteria->compare('created_user', $this->created_user);
		$criteria->compare('created_username', $this->created_username, true);
		$criteria->compare('modified_ip', $this->modified_ip, true);
		$criteria->compare('modified_date', $this->modified_date, true);
		$criteria->compare('modified_user', $this->modified_user);
		$criteria->compare('modified_username', $this->modified_username, true);

		return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 50),
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
        ));
	}

	protected function beforeSave()
    {
        if (parent::beforeSave()) {

        	if ($this->isNewRecord) {
        		$this->password = $this->hashPassword($this->password);
        	} else {
        		if (empty($this->password)) {
        			$old_password = $this->findByPk($this->id)->password;
                	$this->password = $old_password;
            	} else {
            		$this->password = $this->hashPassword($this->password);
            	}
        	}

            return true;
        } else {
            return false;
        }
    }

	public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password, $this->password);
    }

    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

}
