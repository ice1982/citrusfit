<?php
/* @var $this WorkoutController */
/* @var $model Workout */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'timeboard-form',
	'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'role' => 'form'
    )
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'hall_id'); ?>
		<?php
			echo $form->dropDownList($model,'hall_id',
				CHelper::getHallList(new Hall),
				array('empty' => 'Выберите зал', 'class' => 'span4')
			);
		?>
		<?php echo $form->error($model,'hall_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'day_of_week'); ?>
		<?php echo $form->dropDownList($model,'day_of_week',
			array(
				1 => 'Понедельник',
				2 => 'Вторник',
				3 => 'Среда',
				4 => 'Четверг',
				5 => 'Пятница',
				6 => 'Суббота',
				7 => 'Воскресенье',
			),
			array('class' => 'span4')
		); ?>
		<?php echo $form->error($model,'day_of_week'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'time_start'); ?>
		<?php echo $form->textField($model,'time_start', array('class' => 'input-medium')); ?>
		<?php echo $form->error($model,'time_start'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'time_finish'); ?>
		<?php echo $form->textField($model,'time_finish', array('class' => 'input-medium')); ?>
		<?php echo $form->error($model,'time_finish'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'instructor_id'); ?>
		<?php
			echo $form->dropDownList($model,'instructor_id',
				CHelper::getDropdownArray(new Instructor, 'id', 'fio'),
				array('empty' => 'Выберите инструктора', 'class' => 'span4')
			);
		?>
		<?php echo $form->error($model,'instructor_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body', array('class' => 'tinymce')); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->