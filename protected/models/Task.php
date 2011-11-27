<?php

/**
 * This is the model class for table "{{task}}".
 *
 * The followings are the available columns in table '{{task}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $start
 * @property integer $end
 * @property integer $priority
 * @property integer $owner
 * @property integer $project
 * @property integer $parent
 * @property integer $order_no
 * @property integer $assigned_to
 * @property integer $assigned_by
 * @property integer $predecessor
 * @property integer $successor
 * @property integer $status
 */
class Task extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Task the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{task}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('name', 'required'),
		array('project, owner, start, end, status', 'numerical', 'integerOnly'=>true),
		array('name', 'length', 'max'=>128),
		array('description', 'safe'),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('id, name, project, owner, description, start, end, status', 'safe', 'on'=>'search'),
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
			'owner' => array(self::BELONGS_TO, 'User', 'owner')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'start' => 'Start',
			'end' => 'End',
			'priority' => 'Priority',
			'owner' => 'Owner',
			'project' => 'Project',
			'parent' => 'Parent',
			'order_no' => 'Order',
			'assigned_to' => 'Assigned To',
			'assigned_by' => 'Assigned By',
			'predecessor' => 'Predecessor',
			'successor' => 'Successor',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('start',$this->start);
		$criteria->compare('end',$this->end);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('owner',$this->owner);
		$criteria->compare('project',$this->project);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('order_no',$this->order_no);
		$criteria->compare('assigned_to',$this->assigned_to);
		$criteria->compare('assigned_by',$this->assigned_by);
		$criteria->compare('predecessor',$this->predecessor);
		$criteria->compare('successor',$this->successor);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * This is invoked before the record is saved
	 * @return boolean whether the record should be saved or not
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->owner = Yii::app()->user->id;
			}
			return true;
		}
		else
		return false;
	}
}