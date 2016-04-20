<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - ' . $user->username . ' - Сменить пароль пользователя';

$this->breadcrumbs = array(
    'Сотрудники'     => array('index'),
    $user->username => array('view&id=' . $user->id),
    'Сменить пароль',
);

$this->menu = array(
    array(
        'label' => 'Список пользователей',
        'icon'  => 'list',
        'url'   => array('index')
    ),
    array(
        'label' => 'Редактировать пользователя',
        'icon'  => 'edit',
        'url'   => array('update', 'id' => $user->id),
    ),
    array(
        'label' => 'Удалить пользователя',
        'icon'  => 'remove',
        'url'   => array('delete', 'id' => $user->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить этого пользователя (' . $user->username . ')?'
        ),
    ),
);

?>

<h1>Сменить пароль <?php echo $user->username; ?></h1>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'changepassword-form',
    'enableAjaxValidation' => false,
)); ?>

    <p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'new_password'); ?>
        <?php echo $form->passwordField($model,'new_password'); ?>
        <?php echo $form->error($model,'new_password'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'confirm_password'); ?>
        <?php echo $form->passwordField($model,'confirm_password'); ?>
        <?php echo $form->error($model,'confirm_password'); ?>
    </div>

    <div class="buttons">
        <?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-primary')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->