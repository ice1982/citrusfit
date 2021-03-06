<?php

/**
 * This is the model class for table "banners".
 *
 * The followings are the available columns in table 'banners':
 * @property integer $id
 * @property integer $club_id
 * @property string $title
 * @property string $link
 * @property string $image
 * @property string $image_attr_title
 * @property string $image_attr_alt
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
 *
 * The followings are the available model relations:
 * @property ClubItems $club
 */
class Banner extends BaseActiveRecord
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
        return 'banners';
    }

    public function behaviors(){
        return array(
            'ImageBehavior' => array(
                'class' => 'ImageBehavior',
                // 'image_path' => ,
                // 'image_field' => ,
                'original_resize' => true,
                'original_resize_width' => 950,
                'original_resize_height' => false,
                'original_crop' => true,
                'original_crop_width' => 950,
                'original_crop_height' => 396,
                'thumb' => true,
                'thumb_width' => 400,
                'thumb_height' => 167,
                'original_image_filename' => 'banner_' . time(),
            ),
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
                'club_id, nn, created_user, modified_user, active',
                'numerical',
                'integerOnly' => true,
            ),
            array(
                'title, link',
                'length',
                'max' => 256,
            ),
            array(
                'image, image_attr_title, image_attr_alt',
                'length',
                'max' => 512,
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
            array(
                'image',
                'file',
                'types' => 'jpg, gif, png',
                'maxSize' => 1048576 * 5,
                'allowEmpty' => false,
                'on' => 'insert',
            ),
            array(
                'image',
                'file',
                'types' => 'jpg, gif, png',
                'maxSize' => 1048576 * 5,
                'allowEmpty' => true,
                'on' => 'update',
            ),
            array(
                'club_id, title, link, image_attr_title, image_attr_alt',
                'safe',
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, club_id, title, link, image, image_attr_title, image_attr_alt, nn, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username, active',
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
            'link' => 'Link',
            'image' => 'Image',
            'image_attr_title' => 'Image Attr Title',
            'image_attr_alt' => 'Image Attr Alt',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('club_id', $this->club_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('image_attr_title', $this->image_attr_title, true);
        $criteria->compare('image_attr_alt', $this->image_attr_alt, true);
        $criteria->compare('nn', $this->nn);
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

    public function saveOrder($items)
    {
        if (count($items)) {
            foreach ($items as $order => $item) {
                if ($item['item_id'] != '') {
                    $result = $this->updateByPk($item['item_id'], array('nn' => $order));
                }
            }
        }
    }
}
