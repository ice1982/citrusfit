<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'instructor-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
	),
	'clientOptions' => array(
    	'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model, 'fio'); ?>
		<?php echo $form->textField($model, 'fio', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model, 'fio'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'annotation'); ?>
		<?php echo $form->textArea($model, 'annotation',
			array(
				'class' => 'form-control input-large',
			)
		); ?>
		<p class="help-block">Короткий текст.</p>
		<?php echo $form->error($model,'annotation'); ?>
	</div>
   
    <div class="form-group">
		<?php echo $form->labelEx($model,'groups'); ?>
		<?php echo $form->dropDownList($model,'groups',
			array(0 => 'Групповые', 1 => 'Тренажерные'),
			array('class' => 'span2')
		); ?>
		<?php echo $form->error($model,'groups'); ?>
	</div>
	
	<?php if (!empty($model->image)) : ?>
	<div class="form-group">
		<img width=100 src="uploads/<?=$model->image?>" alt="">
	</div>
	<?php endif; ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea(
			$model,
			'body',
			array(
				'rows' => 6,
				'cols' => 50,
				'class' => 'tinymce',
			)
		); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'meta_index'); ?>
		<?php echo $form->dropDownList($model,'meta_index',
			array(0 => 'Нет', 1 => 'Да'),
			array('class' => 'span2')
		); ?>
		<?php echo $form->error($model,'meta_index'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'meta_title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'meta_keywords'); ?>
		<?php echo $form->textArea($model,'meta_keywords', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'meta_keywords'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'meta_description'); ?>
		<?php echo $form->textArea($model,'meta_description', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'meta_description'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->