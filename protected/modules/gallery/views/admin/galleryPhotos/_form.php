<?php
/* @var $this GalleryPhotoController */
/* @var $model GalleryPhoto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'                   => 'gallery-photo-form',
	'enableAjaxValidation' => true,
	'htmlOptions'         => array(
		'enctype' => 'multipart/form-data',
	),
	'clientOptions'        => array(
    	'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'album_id'); ?>
		<?php
			echo $form->dropDownList($model, 'album_id',
				CHelper::getList(new GalleryAlbum),
				array('empty' => 'Выберите альбом')
			);
		?>
		<?php echo $form->error($model,'album_id'); ?>
	</div>

	<?php if (!empty($model->image)) : ?>
	<div class="input-field">
		<img width=100 src="uploads/<?=$model->image?>" alt="">
	</div>
	<?php endif; ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class' => 'input-xlarge')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description', array('class' => 'input-xlarge')); ?>
		<?php echo $form->error($model,'description'); ?>
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

	<div class="input-field">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->