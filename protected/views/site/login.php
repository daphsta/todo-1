<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'login-form',
        'type' => 'horizontal',
        'htmlOptions' => array('class' => 'well'),
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->textFieldRow($model, 'username', array('class' => 'span3')) ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('tip' => 'demo/demo or admin/admin', 'class' => 'span3')); ?>
    <?php echo $form->checkBoxRow($model, 'rememberMe'); ?> 

    <?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> Login', array('class' => 'btn btn-primary', 'type' => 'submit')); ?>

    <?php $this->endWidget(); ?>
</div><!-- form -->
