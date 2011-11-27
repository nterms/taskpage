<?php
Yii::import('zii.widgets.CPortlet');

class ProjectList extends CPortlet
{
	public function init()
	{
		$this->title = CHtml::encode('Projects');
		parent::init();
	}
	
	protected function renderContent()
	{
		$projects = Project::model()->findAll();
		$model = new Project();
		
		$this->render('projectList', array('model' => $model, 'projects' => $projects));
	}
}