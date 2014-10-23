<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $role
 * @property string $description
 * @property string $created_ip
 * @property string $created_date
 * @property integer $created_user
 * @property string $created_username
 * @property string $modified_ip
 * @property string $modified_date
 * @property integer $modified_user
 * @property string $modified_username
 * @property integer $active
 */
class User extends CActiveRecord
{
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
				'username, password, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username',
				'required'
			),
			array(
				'role, created_user, modified_user, active',
				'numerical',
				'integerOnly' => true,
			),
			array(
				'username, password, created_username',
				'length',
				'max' => 200,
			),
			array(
				'description',
				'length',
				'max' => 400,
			),
			array(
				'created_ip, modified_ip, modified_username',
				'length',
				'max' => 300,
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
			'createdBlocks' => array(self::HAS_MANY, 'Block', 'modified_user'),
            'modifiedBlocks' => array(self::HAS_MANY, 'Block', 'created_user'),

            'createdCatalogGroups' => array(self::HAS_MANY, 'CatalogGroup', 'modified_user'),
            'modifiedCatalogGroups' => array(self::HAS_MANY, 'CatalogGroup', 'created_user'),

            'createdCatalogItems' => array(self::HAS_MANY, 'CatalogItem', 'modified_user'),
            'modifiedCatalogItems' => array(self::HAS_MANY, 'CatalogItem', 'created_user'),

            'createdGalleryAlbums' => array(self::HAS_MANY, 'GalleryAlbum', 'modified_user'),
            'modifiedGalleryAlbums' => array(self::HAS_MANY, 'GalleryAlbum', 'created_user'),

            'createdGalleryItems' => array(self::HAS_MANY, 'GalleryItem', 'modified_user'),
            'modifiedGalleryItems' => array(self::HAS_MANY, 'GalleryItem', 'created_user'),

            'createdPages' => array(self::HAS_MANY, 'Page', 'modified_user'),
            'modifiedPages' => array(self::HAS_MANY, 'Page', 'created_user'),

            'createdUsers' => array(self::HAS_MANY, 'User', 'modified_user'),
            'modifiedUsers' => array(self::HAS_MANY, 'User', 'created_user'),
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
			'description' => 'Description',
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
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
