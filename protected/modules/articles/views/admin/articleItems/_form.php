<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id'                   => 'article-form',
	'enableAjaxValidation' => false,
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
				CHtml::listData(ClubHall::model()->findAll(array('order' => 'title')),'id','title'),
				array('empty' => 'Для всех клубов', 'class' => 'form-control input-large')
			);
		?>
		<?php echo $form->error($model,'club_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php
			echo $form->dropDownList($model,'type_id',
                CHtml::listData(ArticleType::model()->active()->findAll(array('order' => 'title')),'id','title'),
				array('empty' => 'Выберите тип публикации', 'class' => 'form-control input-large')
			);
		?>
		<?php echo $form->error($model,'type_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'annotation'); ?>
		<?php echo $form->textArea($model, 'annotation',
			array(
				'class' => 'form-control input-large',
			)
		); ?>
		<p class="help-block">Короткий текст, который будет отображаться на главной странице сайта.</p>
		<?php echo $form->error($model,'annotation'); ?>
	</div>

	<?php if (!empty($model->image)) : ?>
	<div class="form-group">
		<img width=100 src="uploads/<?=$model->image?>" alt="">
	</div>
	<?php endif; ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image_attr_title'); ?>
		<?php echo $form->textArea($model,'image_attr_title', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'image_attr_title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'image_attr_alt'); ?>
		<?php echo $form->textArea($model,'image_attr_alt', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'image_attr_alt'); ?>
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
		<?php echo $form->labelEx($model,'pubdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'      => 'pubdate',
            'language'  => 'ru',
            'model'     => $model,
            'attribute' => 'pubdate',
            'options'=>array(
				'showAnim'    =>'fade',
				'dateFormat'  =>'dd.mm.yy',
				'changeYear'  => true,
				'changeMonth' => true,
				'yearRange'   => (date('Y') - 1) . ':' . (date('Y') + 1),
				'onSelect'    => false,
            ),
            'htmlOptions' => array(
                'value' => CHelper::sqlDateToHumanDate($model->pubdate),
                'class' => 'form-control input-small',
            ),
        )); ?>
		<?php echo $form->error($model,'pubdate'); ?>
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