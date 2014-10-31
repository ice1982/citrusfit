<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'                   => 'gallery-album-form',
	'enableAjaxValidation' => true,
	'clientOptions'        => array(
    	'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input-field">
		<?php echo $form->labelEx($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('class' => 'input-large')); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description',
			array(
				'class' => 'input-large',
			)
		); ?>
		<p class="help-block">Короткий текст.</p>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->