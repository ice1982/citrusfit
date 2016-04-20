<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'club-form',
	'enableAjaxValidation' => false,
	'clientOptions' => array(
    	'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'annotation'); ?>
		<?php echo $form->textArea($model,'annotation', array('class' => 'form-control input-large tinymce')); ?>
		<?php echo $form->error($model,'annotation'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description', array('class' => 'form-control input-large tinymce')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body', array('class' => 'form-control input-large tinymce')); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'contact_phones'); ?>
		<?php echo $form->textField($model,'contact_phones', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'contact_phones'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'contact_address'); ?>
		<?php echo $form->textField($model,'contact_address', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'contact_address'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'contact_info'); ?>
		<?php echo $form->textArea($model,'contact_info', array('class' => 'form-control input-large tinymce')); ?>
		<?php echo $form->error($model,'contact_info'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'contact_coordinates'); ?>
		<?php echo $form->textField($model,'contact_coordinates', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'contact_coordinates'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->