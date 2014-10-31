<?php
/* @var $this CatalogGroupController */
/* @var $model CatalogGroup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'                   => 'catalog-group-form',
	'enableAjaxValidation' => false,
	'clientOptions'        => array(
    	'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class' => 'input-large')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug', array('class' => 'input-large')); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->