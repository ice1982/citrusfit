<?php
/* @var $this HallController */
/* @var $model Hall */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'                   => 'hall-form',
	'enableAjaxValidation' => true,
	'clientOptions'        => array(
    	'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'club_id'); ?>
		<?php
			echo $form->dropDownList($model,'club_id',
				CHelper::getList(new Club),
				array('empty' => 'Выберите клуб')
			);
		?>
		<?php echo $form->error($model,'club_id'); ?>
	</div>


	<div class="input-field">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class' => 'input-large')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->