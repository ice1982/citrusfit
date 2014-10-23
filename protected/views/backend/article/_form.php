<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'                   => 'article-form',
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

    <?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
        <div class="input-field">
            <?php echo $form->labelEx($model, 'title'); ?> <?php echo $lang; ?><br />
            <?php echo $form->textField($model, 'title' . $suffix, array('class' => 'input-large')); ?><br />
            <?php echo $form->error($model, 'title' . $suffix); ?>
        </div>
    <?php endforeach; ?>

	<div class="input-field">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',
			array(
				'class' => 'input-large',
			)
		); ?>
		<p class="help-block">Латинское название, которое будет отображаться в строке браузера.</p>
		<?php echo $form->error($model,'slug'); ?>
	</div>

    <?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
        <div class="input-field">
            <?php echo $form->labelEx($model, 'annotation'); ?> <?php echo $lang; ?><br />
            <?php echo $form->textArea($model, 'annotation' . $suffix, array('class' => 'input-large')); ?><br />
            <p class="help-block">Короткий текст, который будет отображаться на главной странице сайта.</p>
            <?php echo $form->error($model, 'annotation' . $suffix); ?>
        </div>
    <?php endforeach; ?>

    <?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
        <div class="input-field">
            <?php echo $form->labelEx($model, 'body'); ?> <?php echo $lang; ?><br />
            <?php echo $form->textArea(
                $model,
                'body' . $suffix,
                array(
                    'rows'  => 6,
                    'cols'  => 50,
                    'class' => 'tinymce',
                )
            ); ?>
            <?php echo $form->error($model, 'body' . $suffix); ?>
        </div>
    <?php endforeach; ?>

	<div class="input-field">
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
                'class' => 'input-small',
            ),
        )); ?>
		<?php echo $form->error($model,'pubdate'); ?>
	</div>

	<div class="input-field">
		<?php echo $form->labelEx($model,'meta_index'); ?>
		<?php echo $form->dropDownList($model,'meta_index',
			array(0 => 'Нет', 1 => 'Да'),
			array('class' => 'span2')
		); ?>
		<?php echo $form->error($model,'meta_index'); ?>
	</div>

    <?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
        <div class="input-field">
            <?php echo $form->labelEx($model, 'meta_title'); ?> <?php echo $lang; ?><br />
            <?php echo $form->textField($model, 'meta_title' . $suffix, array('class' => 'input-large')); ?><br />
            <?php echo $form->error($model, 'meta_title' . $suffix); ?>
        </div>
    <?php endforeach; ?>

    <?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
        <div class="input-field">
            <?php echo $form->labelEx($model, 'meta_description'); ?> <?php echo $lang; ?><br />
            <?php echo $form->textArea($model, 'meta_description' . $suffix, array('class' => 'input-large')); ?><br />
            <?php echo $form->error($model, 'meta_description' . $suffix); ?>
        </div>
    <?php endforeach; ?>

    <?php foreach (DMultilangHelper::suffixList() as $suffix => $lang) : ?>
        <div class="input-field">
            <?php echo $form->labelEx($model, 'meta_keywords'); ?> <?php echo $lang; ?><br />
            <?php echo $form->textArea($model, 'meta_keywords' . $suffix, array('class' => 'input-large')); ?><br />
            <?php echo $form->error($model, 'meta_keywords' . $suffix); ?>
        </div>
    <?php endforeach; ?>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->