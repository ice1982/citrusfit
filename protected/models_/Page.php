<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $begin_body
 * @property string $end_body
 * @property integer $nn
 * @property integer $show_in_menu
 * @property integer $show_title
 * @property string $module
 * @property integer $undeletable
 * @property string $template
 * @property integer $meta_index
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
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
class Page extends BaseActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pages';
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
                'title, created_user, created_username, modified_user, modified_username',
                'required',
            ),
			array(
                'nn, show_in_menu, show_title, undeletable, meta_index, created_user, modified_user, active',
                'numerical',
                'integerOnly' => true,
            ),
			array(
                'title, alias, meta_title, created_username',
                'length',
                'max' => 200,
            ),
			array(
                'module, template',
                'length',
                'max' => 50,
            ),
			array(
                'meta_description, meta_keywords',
                'length',
                'max' => 500,
            ),
			array(
                'created_ip, modified_ip, modified_username',
                'length',
                'max' => 300,
            ),
			array(
                'begin_body, end_body, created_date, modified_date',
                'safe',
            ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(
                'id, title, alias, begin_body, end_body, nn, show_in_menu, show_title, module, undeletable, template, meta_index, meta_title, meta_description, meta_keywords, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username, active',
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
			'title' => 'Title',
			'alias' => 'Alias',
			'begin_body' => 'Begin Body',
			'end_body' => 'End Body',
			'nn' => 'Nn',
			'show_in_menu' => 'Show In Menu',
			'show_title' => 'Show Title',
			'module' => 'Module',
			'undeletable' => 'Undeletable',
			'template' => 'Template',
			'meta_index' => 'Meta Index',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('begin_body',$this->begin_body,true);
		$criteria->compare('end_body',$this->end_body,true);
		$criteria->compare('nn',$this->nn);
		$criteria->compare('show_in_menu',$this->show_in_menu);
		$criteria->compare('show_title',$this->show_title);
		$criteria->compare('module',$this->module,true);
		$criteria->compare('undeletable',$this->undeletable);
		$criteria->compare('template',$this->template,true);
		$criteria->compare('meta_index',$this->meta_index);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
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
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findMenuPages()
	{
		$model = $this->findAllByAttributes(
			array(
				'show_in_menu' => 1,
				'active' => 1,
			),
			array(
				'order' => 'nn',
			)
		);

		return $model;
	}

    public function getPageInformationByModule($name)
    {
        $page_model = $this->findByAttributes(array('module' => $name));

        return $page_model;
    }
}
