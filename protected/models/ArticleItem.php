<?php

/**
 * This is the model class for table "article_items".
 *
 * The followings are the available columns in table 'article_items':
 * @property integer $id
 * @property integer $type_id
 * @property string $title
 * @property string $annotation
 * @property integer $club_id
 * @property string $image
 * @property string $image_attr_title
 * @property string $image_attr_alt
 * @property string $body
 * @property string $pubdate
 * @property integer $meta_index
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
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
class ArticleItem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, title, pubdate, created_username, modified_username', 'required'),
			array('type_id, club_id, meta_index, created_user, modified_user, active', 'numerical', 'integerOnly'=>true),
			array('title, meta_title, created_ip, modified_ip, modified_username', 'length', 'max'=>300),
			array('image, image_attr_title, image_attr_alt', 'length', 'max'=>512),
			array('meta_keywords, meta_description', 'length', 'max'=>500),
			array('created_username', 'length', 'max'=>200),
			array('annotation, body, created_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type_id, title, annotation, club_id, image, image_attr_title, image_attr_alt, body, pubdate, meta_index, meta_title, meta_keywords, meta_description, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username, active', 'safe', 'on'=>'search'),
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
			'type_id' => 'Type',
			'title' => 'Title',
			'annotation' => 'Annotation',
			'club_id' => 'Club',
			'image' => 'Image',
			'image_attr_title' => 'Image Attr Title',
			'image_attr_alt' => 'Image Attr Alt',
			'body' => 'Body',
			'pubdate' => 'Pubdate',
			'meta_index' => 'Meta Index',
			'meta_title' => 'Meta Title',
			'meta_keywords' => 'Meta Keywords',
			'meta_description' => 'Meta Description',
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('annotation',$this->annotation,true);
		$criteria->compare('club_id',$this->club_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('image_attr_title',$this->image_attr_title,true);
		$criteria->compare('image_attr_alt',$this->image_attr_alt,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('pubdate',$this->pubdate,true);
		$criteria->compare('meta_index',$this->meta_index);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
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
	 * @return ArticleItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
