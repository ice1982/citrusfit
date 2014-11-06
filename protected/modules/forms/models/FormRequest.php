<?php

/**
 * This is the model class for table "form_requests".
 *
 * The followings are the available columns in table 'form_requests':
 * @property integer $id
 * @property integer $club_id
 * @property string $fio
 * @property string $phone
 * @property string $description
 * @property string $created_ip
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property ClubItems $club
 */
class FormRequest extends BaseActiveRecord
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

        );
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'form_requests';
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
				'fio',
				'required',
			),
			array(
				'club_id',
				'numerical',
				'integerOnly' => true,
			),
			array(
				'fio, created_ip',
				'length',
				'max' => 300,
			),
			array(
				'email',
				'length',
				'max' => 200,
			),
			array(
				'phone',
				'length',
				'max' => 100,
			),
			array(
				'description',
				'length',
				'max' => 500,
			),
			array(
				'created_date',
				'safe',
			),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(
				'id, club_id, fio, phone, description, created_ip, created_date',
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
			'club' => array(self::BELONGS_TO, 'ClubItems', 'club_id'),
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
			'fio' => 'Fio',
			'phone' => 'Phone',
			'description' => 'Description',
			'created_ip' => 'Created Ip',
			'created_date' => 'Created Date',
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
		$criteria->compare('fio', $this->fio, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('created_ip', $this->created_ip, true);
		$criteria->compare('created_date', $this->created_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => array('pageSize' => 50),
			'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
        ));
	}

}
