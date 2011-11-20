<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::app()->basePath . '/components/js/lib/jquery/plugins/jquery.ui.nestedSortable.js'), CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::app()->basePath . '/components/js/lib/jquery/plugins/jquery.tasklist.js'), CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::app()->basePath . '/components/js/taskspage.js'), CClientScript::POS_END);
	//Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
	
	$this->pageTitle=Yii::app()->name;
	
?>
<ul id="tasklist" class="sortable selectable tp-tasks">
	<?php foreach ($tasks as $task) : ?>
	<li id="task_<?php echo $task->id; ?>" class="ui-widget-content tp-task">
		<div>
			<span class="tp-icon tp-icon-24 tp-icon-handle"></span>
			<span class="tp-task-name"><?php echo $task->name; ?></span>
		</div>
	</li>
	<?php endforeach; ?>
</ul>
<div class="form">
	<?php
		$form = $this->beginWidget(
			'CActiveForm', 
			array(
				'id' => 'task-form', 
				//'enableClientValidation' => true, 
				'enableAjaxValidation' => true, 
				'action' => array('task/create'),
				'clientOptions' => array('validateOnSubmit' => true)
			)
		);
	?>
	<?php echo $form->errorSummary($model); ?>
	<div class="row" >
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row submit" >
		<?php echo CHtml::submitButton('+'); ?>
		<?php echo $form->hiddenField($model, 'project', array('value' => 1)); ?>
		<?php echo $form->hiddenField($model, 'user', array('value' => 1)); ?>
	</div>
	
	<?php $this->endWidget(); ?>
</div>

<div class="temp">
	<a href="#" id="serialize">Serialize</a>
</div>
