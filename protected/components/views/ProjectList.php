<ul class="sortable tp-projects">
	<?php foreach ($projects as $project) : ?>
	<li class="tp-project">
		<span class="tp-icon tp-icon-24 tp-icon-handle"></span>
		<span class="tp-project-name"><?php echo $project->name; ?></span>
	</li>
	<?php endforeach; ?>
</ul>
<div class="form">
	<?php
		$form = $this->beginWidget(
			'CActiveForm', 
			array(
				'id' => 'project-form', 
				'enableClientValidation' => true, 
				'enableAjaxValidation' => true, 
				'action' => array('project/create'),
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
	</div>
	
	<?php $this->endWidget(); ?>
</div>