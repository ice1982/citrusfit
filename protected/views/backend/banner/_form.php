<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'                   => 'banner-form',
	'enableAjaxValidation' => true,
	'htmlOptions'         => array(
		'enctype' => 'multipart/form-data',
	),
	'clientOptions'        => array(
    	'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class' => 'input-xlarge')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'link'); ?>
		<?=Yii::app()->getBaseUrl(true)?>/ <?php echo $form->textField($model,'link', array('class' => 'input-xlarge')); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<?php if (!empty($model->image)) : ?>
	<div class="input-field">
		<img width=100 src="uploads/<?=$model->image?>" alt="">
	</div>
	<?php endif; ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image'); ?>
		<p class="help-block">Оптимальный размер баннера - 908px на 350px.</p>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'image_attr_title'); ?>
		<?php echo $form->textField($model,'image_attr_title', array('class' => 'input-xlarge')); ?>
		<?php echo $form->error($model,'image_attr_title'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'image_attr_alt'); ?>
		<?php echo $form->textField($model,'image_attr_alt', array('class' => 'input-xlarge')); ?>
		<?php echo $form->error($model,'image_attr_alt'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->