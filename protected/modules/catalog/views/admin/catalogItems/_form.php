<?php
/* @var $this CatalogController */
/* @var $model Catalog */
/* @var $form CActiveForm */
?>

<div class="form">


<?php $form = $this->beginWidget('CActiveForm', array(
	'id'                   => 'catalog-form',
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
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php
			echo $form->dropDownList($model,'group_id',
				CHelper::getList(new CatalogGroup),
				array('empty' => 'Выберите тип товара')
			);
		?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'alias'); ?>
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
		<?php echo $form->textArea($model,'body', array('class' => 'form-control input-large tinymce')); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price', array('class' => 'form-control input-small')); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'price_to_view'); ?>
		<?php echo $form->textField($model,'price_to_view', array('class' => 'form-control input-small')); ?>
		<?php echo $form->error($model,'price_to_view'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'price_to_view_text'); ?>
		<?php echo $form->textField($model,'price_to_view_text', array('class' => 'form-control input-large')); ?>
		<?php echo $form->error($model,'price_to_view_text'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'related'); ?>
		<?php echo $form->listBox($model, 'related', CHtml::listData( $related, 'id', 'title' ), array('class' => 'chosen-select', 'multiple' => 'multiple', 'data-placeholder' => 'Выберите сопутствующие товары')); ?>
		<?php echo $form->error($model,'related'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'special'); ?>
		<?php echo $form->dropDownList($model,'special',
			array(0 => 'Нет', 1 => 'Да'),
			array('class' => 'span2')
		); ?>
		<?php echo $form->error($model,'special'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'new_price'); ?>
		<?php echo $form->textField($model,'new_price', array('class' => 'form-control input-small')); ?>
		<?php echo $form->error($model,'new_price'); ?>
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