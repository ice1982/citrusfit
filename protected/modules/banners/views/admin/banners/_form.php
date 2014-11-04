<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
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

	<div class="form-group">
		<?php echo $form->labelEx($model,'club_id'); ?>
		<?php
			echo $form->dropDownList($model, 'club_id',
				CHtml::listData(ClubHall::model()->findAllByAttributes(array('club_id' => $club->id), array('order' => 'title')),'id','title'),
				array('empty' => 'Для всех клубов')
			);
		?>
		<?php echo $form->error($model,'club_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class' => 'form-control input-xlarge')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'link'); ?>
		<?=Yii::app()->getBaseUrl(true)?>/ <?php echo $form->textField($model,'link', array('class' => 'form-control input-xlarge')); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<?php if (!empty($model->image)) : ?>
	<div class="form-group">
		<img width=100 src="uploads/<?=$model->image?>" alt="">
	</div>
	<?php endif; ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image'); ?>
		<p class="help-block">Оптимальный размер баннера - 640px на 270px.</p>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image_attr_title'); ?>
		<?php echo $form->textField($model,'image_attr_title', array('class' => 'form-control input-xlarge')); ?>
		<?php echo $form->error($model,'image_attr_title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image_attr_alt'); ?>
		<?php echo $form->textField($model,'image_attr_alt', array('class' => 'form-control input-xlarge')); ?>
		<?php echo $form->error($model,'image_attr_alt'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->