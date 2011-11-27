<?php
/**
 * Javascript functions
 */
$AF_AFTER_VALIDATE = <<<JS
js:function(form, data, hasError){
	if(hasError)
		return false;
	else {
		$('#tasklist').tasklist('addTask', $('#task-form').serialize());
	}
}
JS;

Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::app()->basePath . '/components/js/lib/tp/tp.js'), CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::app()->basePath . '/components/js/lib/jquery/plugins/jquery.ui.nestedSortable.js'), CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::app()->basePath . '/components/js/lib/jquery/plugins/jquery.tasklist.js'), CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::app()->basePath . '/components/js/taskspage.js'), CClientScript::POS_END);
//Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');

$this->pageTitle=Yii::app()->name;
?>
<form >
	<ul id="tasklist" class="sortable selectable tp-tasks">
		<?php foreach ($tasks as $task) : ?>
		<li id="task_<?php echo $task->id; ?>" class="ui-widget-content tp-task">
			<div>
				<span class="tp-icon tp-icon-24 tp-icon-handle"></span>
				<span class="tp-task-check"><input type="checkbox" id="task_check_<?php echo $task->id; ?>" name="task_check_<?php echo $task->id; ?>" /></span>
				<span class="tp-task-name"><?php echo $task->name; ?></span>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
</form>

<div class="form">
	<?php
		$form = $this->beginWidget(
			'CActiveForm', 
			array(
				'id' => 'task-form', 
				//'enableClientValidation' => true, 
				'enableAjaxValidation' => true, 
				'action' => array('task/create'),
				'clientOptions' => array(
					'validateOnSubmit'	=> true,
					'afterValidate' 	=> $AF_AFTER_VALIDATE
				)
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
		<?php echo $form->hiddenField($model, 'owner', array('value' => Yii::app()->user->id)); ?>
	</div>
	
	<?php $this->endWidget(); ?>
</div>

<div class="temp">
	<a href="#" id="serialize">Serialize</a>
</div>
