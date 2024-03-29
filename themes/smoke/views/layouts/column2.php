<?php $this->beginContent('//layouts/main'); ?>
<div id="content-wrapper" class="container">
	<div class="span-5">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
			
			$this->widget('projectList');
		?>
		</div><!-- sidebar -->
	</div>
	<div class="span-19 last">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	
</div>
<?php $this->endContent(); ?>