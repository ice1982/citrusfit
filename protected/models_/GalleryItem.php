<?php

/**
 * This is the model class for table "gallery_items".
 *
 * The followings are the available columns in table 'gallery_items':
 * @property integer $id
 * @property integer $album_id
 * @property string $image
 * @property string $image_attr_title
 * @property string $image_attr_alt
 * @property string $title
 * @property string $description
 * @property string $tags
 * @property integer $nn
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
class GalleryItem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gallery_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array(
				'album_id, image, created_user, created_username, modified_user, modified_username',
				'required',
			),
			array(
				'album_id, nn, created_user, modified_user, active',
				'numerical',
				'integerOnly' => true,
			),
			array(
				'image, created_username',
				'length',
				'max' => 200,
			),
			array(
				'image_attr_title, image_attr_alt, title, tags, created_ip, modified_ip, modified_username',
				'length',
				'max' => 300,
			),
			array(
				'description',
				'length',
				'max' => 1024,
			),
			array(
				'created_date, modified_date',
				'safe'
			),
			array(
				'id, album_id, image, image_attr_title, image_attr_alt, title, description, tags, nn, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username, active',
				'safe',
				'on'=>'search'
			),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'album' => array(self::BELONGS_TO, 'GalleryAlbum', 'album_id'),
            'modifiedUser' => array(self::BELONGS_TO, 'User', 'modified_user'),
            'createdUser' => array(self::BELONGS_TO, 'User', 'created_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'album_id' => 'Album',
			'image' => 'Image',
			'image_attr_title' => 'Image Attr Title',
			'image_attr_alt' => 'Image Attr Alt',
			'title' => 'Title',
			'description' => 'Description',
			'tags' => 'Tags',
			'nn' => 'Nn',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('album_id',$this->album_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('image_attr_title',$this->image_attr_title,true);
		$criteria->compare('image_attr_alt',$this->image_attr_alt,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('nn',$this->nn);
		$criteria->compare('created_ip',$this->created_ip,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user);
		$criteria->compare('created_username',$this->created_username,true);
		$criteria->compare('modified_ip',$this->modified_ip,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('modified_user',$this->modified_user);
		$criteria->compare('modified_username',$this->modified_username,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GalleryItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findAllByAlbumTitle($title, $order, $limit = false)
	{
		$album_model = GalleryAlbum::model()->findByAttributes(array('title' => $title));

		if (!isset($album_model->id)) {
			return false;
		}

		$criteria = new CDbCriteria;

		$criteria->condition = 'album_id = :album_id';
		$criteria->params = array(':album_id' => $album_model->id);

		if ($limit != false) {
			$criteria->limit = $limit;
		}
		$criteria->order = 'nn ' . $order;

		$items_model = $this->findAll($criteria);

		return $items_model;
	}

	public function findAllByPkArray($array, $order, $limit = false)
	{
		$criteria = new CDbCriteria;

		$criteria->addInCondition('id', $array);

		if ($limit != false) {
			$criteria->limit = $limit;
		}

		$criteria->order = 'nn ' . $order;

		$items_model = $this->findAll($criteria);

		return $items_model;
	}
}
