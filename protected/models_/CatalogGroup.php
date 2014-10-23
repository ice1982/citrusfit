<?php

/**
 * This is the model class for table "catalog_groups".
 *
 * The followings are the available columns in table 'catalog_groups':
 * @property integer $id
 * @property integer $parent_id
 * @property string $alias
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $image_attr_title
 * @property string $image_attr_alt
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
 * @property CatalogGroup $parent
 * @property CatalogGroup[] $catalogGroups
 * @property CatalogItems[] $catalogItems
 */
class CatalogGroup extends BaseActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'catalog_groups';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array(
                'alias, title, created_username, modified_username',
                'required',
            ),
            array(
                'parent_id, created_user, modified_user, active',
                'numerical',
                'integerOnly' => true,
            ),
            array(
                'alias, title, image_attr_title, image_attr_alt, created_ip, modified_ip, modified_username',
                'length',
                'max' => 300,
            ),
            array(
                'image, created_username',
                'length',
                'max' => 200,
            ),
            array(
                'description',
                'length',
                'max' => 1024,
            ),
            array(
                'created_date, modified_date',
                'safe',
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, parent_id, alias, title, description, image, image_attr_title, image_attr_alt, created_ip, created_date, created_user, created_username, modified_ip, modified_date, modified_user, modified_username, active',
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
            'parent' => array(self::BELONGS_TO, 'CatalogGroup', 'parent_id'),
            'groups' => array(self::HAS_MANY, 'CatalogGroup', 'parent_id'),
            'items' => array(self::HAS_MANY, 'CatalogItem', 'group_id'),
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
            'parent_id' => 'Группа',
            'alias' => 'Алиас',
            'title' => 'Название',
            'description' => 'Описание',
            'image' => 'Изображение',
            'image_attr_title' => 'Аттрибут изображения: Title',
            'image_attr_alt' => 'Аттрибут изображения: Alt',
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
        $criteria->compare('parent_id',$this->parent_id);
        $criteria->compare('alias',$this->alias,true);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('description',$this->title,true);
        $criteria->compare('image',$this->image,true);
        $criteria->compare('image_attr_title',$this->image_attr_title,true);
        $criteria->compare('image_attr_alt',$this->image_attr_alt,true);
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
     * @return CatalogGroup the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function findAllMainGroups()
    {
        return $this->findAllByAttributes(array('parent_id' => null));
    }

    public function findAllChildrenGroups($string = false)
    {
        $id = $this->modifyArgumentStringToId($string);

        return $this->findAllByAttributes(array('parent_id' => $id));
    }

    public function findAllParentGroups()
    {
        $dump = $this->_getAllGroupsArray();
        $parents = $this->_getParentsFromGroupsArray($this->id, $this->parent_id, $dump);
        $result = $this->_getParentsArray($parents);

        return $this->findAllByPkArray($result);
    }

    public function setBreadcrumbs($models_array)
    {
        $breadcrumbs = array();

        foreach ($models_array as $key => $model) {
            if ($key == 0) {
                $breadcrumbs[] = $model->title;
            } else {
                $breadcrumbs[$model->title] = Yii::app()->createUrl('catalog/index/group/' . $model->id);

            }
        }
        $breadcrumbs['Каталог трубопроводной арматуры'] = 'catalog/index';


        $reversed = array_reverse($breadcrumbs);

        return $reversed;
    }

    public function findAllItems($string = false)
    {
        if ($string === false) {
            $items_model = $this->catalogType1Items;
        } else {
            $id = $this->modifyArgumentStringToId($string);

            $group_model = $this->findByPk($id);
            $items_model = $group_model->catalogType1Items;
        }

        return $items_model;
    }

    /**
     * TODO
     */
    public function isGroupHaveChildren()
    {
        if ((isset($this->groups)) && (count($this->groups))) {
            return true;
        }
    }

    public function buildGroupTree()
    {
        $groups_model = $this->findAll();

        $level_1 = array();
        $level_2 = array();
        $level_3 = array();

        foreach ($groups_model as $group_model) {
            if (empty($group_model->parent_id)) {
                $level_1[$group_model->id] = $group_model->title;
            } elseif (empty($group_model->parent->parent_id)) {
                $level_2[$group_model->parent->id][$group_model->id] = $group_model->title;
            } elseif (empty($group_model->parent->parent->parent_id)) {
                $level_3[$group_model->parent->parent->id][$group_model->parent->id][$group_model->id] = $group_model->title;
            }
        }

        $dump = array();

        foreach ($level_1 as $id1 => $value1) {
            $dump[] = array('id' => $id1, 'title' => $value1);

            if (isset($level_2[$id1])) foreach ($level_2[$id1] as $id2 => $value2) {
                $dump[] = array('id' => $id2, 'title'  => ' - ' . $value2);

                if (isset($level_3[$id1][$id2])) foreach ($level_3[$id1][$id2] as $id3 => $value3) {
                    $dump[] = array('id' => $id3, 'title'  => '  -- ' . $value3);
                }
            }
        }

        return $dump;
    }

    private function _getAllGroupsArray()
    {
        $groups = $this->findAll();

        $data = array();

        foreach ($groups as $key => $group) {
            $data[$group->id] = new StdClass;

            $data[$group->id]->id = $group->parent_id;
            $data[$group->id]->parent_id = $group->parent_id;
            $data[$group->id]->title = $group->title;
        }

        return $data;
    }

    private function _getParentsFromGroupsArray($id, $parent_id, $dump)
    {
        if (empty($parent_id)) {
            $result[] = array('id' => $id, 'parent_id' => $parent_id);
        } else {

            if (count($dump) > 0) foreach ($dump as $key => $value) {
                if ($key == $parent_id) {
                    $result[] = array('id' => $id, 'parent_id' => $parent_id);
                    unset($dump[$key]);
                    $result[] = $this->_getParentsFromGroupsArray($parent_id, $value->parent_id, $dump);
                }
            } else {
                $result[] = array('id' => $id, 'parent_id' => $parent_id);
            }
        }

        return $result;
    }

    private function _getParentsArray($parents)
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($parents));

        $result = array();

        foreach ($iterator as $key => $value) {
            if ($key == 'id') {
                $result[] = $value;
            }
        }

        return $result;
    }

    public function setPageTitle()
    {
        $title = $this->title . ' | ' .  Yii::app()->name;

        return $title;
    }

}
