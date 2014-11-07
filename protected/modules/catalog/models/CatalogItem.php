<?php

/**
 * This is the model class for table "catalog_items".
 *
 * The followings are the available columns in table 'catalog_items':
 * @property integer $id
 * @property string $clubs
 * @property integer $group_id
 * @property string $title
 * @property string $annotation
 * @property string $image
 * @property string $image_attr_alt
 * @property string $image_attr_title
 * @property string $body
 * @property integer $nn
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
 *
 * The followings are the available model relations:
 * @property CatalogGroups $group
 * @property ClubItems $club
 */
class CatalogItem extends BaseActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
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
                'thumb' => true,
                'thumb_width' => 300,
                'thumb_height' => 225,
                'original_image_filename' => 'catalog_' . time(),
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
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'catalog_items';
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
                'group_id, title',
                'required',
            ),
            array(
                'group_id, nn, meta_index, created_user, modified_user, active',
                'numerical',
                'integerOnly' => true,
            ),
            array(
                'clubs',
                'length',
                'max' => 100,
            ),
            array(
                'created_username',
                'length',
                'max' => 200,
            ),
            array(
                'title, meta_title, created_ip, modified_ip, modified_username',
                'length',
                'max' => 300,
            ),
            array(
                'annotation',
                'length',
                'max' => 300,
            ),
            array(
                'image, image_attr_alt, image_attr_title',
                'length',
                'max' => 512,
            ),
            array(
                'meta_keywords, meta_description',
                'length',
                'max' => 500,
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
                'clubs, group_id, title, image_attr_alt, image_attr_title, body, meta_index, meta_title, meta_keywords, meta_description',
                'safe',
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, clubs, group_id, title, image, image_attr_alt, image_attr_title, body, nn, meta_index, meta_title, meta_keywords, meta_description, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username, active',
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
            'group' => array(self::BELONGS_TO, 'CatalogGroup', 'group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'clubs' => 'Clubs',
            'group_id' => 'Group',
            'title' => 'Title',
            'annotation' => 'Annotation',
            'image' => 'Image',
            'image_attr_alt' => 'Image Attr Alt',
            'image_attr_title' => 'Image Attr Title',
            'body' => 'Body',
            'nn' => 'Nn',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('clubs', $this->clubs);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('image_attr_alt', $this->image_attr_alt, true);
        $criteria->compare('image_attr_title', $this->image_attr_title, true);
        $criteria->compare('body', $this->body, true);
        $criteria->compare('nn', $this->nn);
        $criteria->compare('meta_index', $this->meta_index);
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('meta_description', $this->meta_description, true);
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

    protected function afterFind()
    {
        parent::afterFind();

        $this->clubs = json_decode($this->clubs);
    }

    protected function beforeValidate()
    {
        if (parent::beforeValidate()) {

            // var_dump($this->clubs);

            if (is_array($this->clubs)) {
                $clubs = array();
                foreach ($this->clubs as $key => $club) {
                    if (empty($club)) {
                        $clubs = null;

                        break;
                    } else {
                        $clubs[$key] = (int) $club;
                    }
                }
                $this->clubs = $clubs;

                if ($this->clubs !== null) {
                    $this->clubs = json_encode($this->clubs);
                }
            }

            return true;
        } else {
            return false;
        }
    }


    public function findAllItemsOfClubJson($club_id, $active = true)
    {

        $criteria = new CDbCriteria;

        if ($active) {
            $criteria->scopes = array('active');
        }

        $criteria->condition = 'clubs IS NULL';
        $criteria->addSearchCondition('clubs', '[' . $club_id . ']', true, 'OR');
        $criteria->addSearchCondition('clubs', '[' . $club_id . ',', true, 'OR');
        $criteria->addSearchCondition('clubs', ',' . $club_id . ',', true, 'OR');
        $criteria->addSearchCondition('clubs', ',' . $club_id . ']', true, 'OR');

        $criteria->order = 'group_id, nn';

        $model = $this->findAll($criteria);

        return $model;
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
