<?php
/* @var $this SiteController */
/* @var $error array */

// $this->pageTitle = Yii::app()->name . ' - Ошибка';

?>

<h1><?php echo $code; ?></h1>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>