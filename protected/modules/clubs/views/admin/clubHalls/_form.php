<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'club-hall-form',
	'enableAjaxValidation' => false,
	'clientOptions' => array(
    	'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'club_id'); ?>
		<?php
			echo $form->dropDownList($model,'club_id',
				CHtml::listData(ClubItem::model()->findAll(array('order' => 'title')), 'id','title'),
				array('empty' => 'Выберите клуб', 'class' => 'form-control input-large')
			);
		?>
		<?php echo $form->error($model,'club_id'); ?>
	</div>


	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->