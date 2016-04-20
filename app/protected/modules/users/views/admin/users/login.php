<h1>Вход</h1>

<div class="form">
<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'login-form',
	'enableClientValidation' => false,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<div class="form-group">
		<?php echo $form->labelEx($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
		<?php echo $form->error($model, 'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="rememberMe">
		<?php echo $form->checkBox($model, 'rememberMe'); ?>
		<?php echo $form->label($model, 'rememberMe', array('class' => 'checkbox')); ?>
		<?php echo $form->error($model, 'rememberMe'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Войти', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
