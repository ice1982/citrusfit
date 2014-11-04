<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'                   => 'page-form',
	'enableAjaxValidation' => true,
	'clientOptions'        => array(
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
		<?php echo $form->labelEx($model,'club_id'); ?>
		<?php
			echo $form->dropDownList($model, 'club_id',
				CHelper::getList(new Club),
				array('empty' => 'Для всех клубов')
			);
		?>
		<?php echo $form->error($model,'club_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea(
			$model,
			'body',
			array(
				'rows'  => 6,
				'cols'  => 50,
				'class' => 'tinymce',
			)
		); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php
			echo $form->dropDownList($model,'parent_id',
				CHtml::listData(
            		Page::model()->of_club()->findAll(array('order' => '`order`')),
            		'id', 'title'
        		),
				array('empty' => 'Выберите страницу')
			);
		?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'show_in_menu'); ?>
		<?php echo $form->dropDownList($model,'show_in_menu',
			array(0 => 'Нет', 1 => 'Да'),
			array('class' => 'span2')
		); ?>
		<?php echo $form->error($model,'show_in_menu'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'show_title'); ?>
		<?php echo $form->dropDownList($model,'show_title',
			array(0 => 'Нет', 1 => 'Да'),
			array('class' => 'span2')
		); ?>
		<?php echo $form->error($model,'show_title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'template'); ?>
		<?php echo $form->textField($model,'template', array('class' => 'form-control input-medium')); ?>
		<?php echo $form->error($model,'template'); ?>
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

