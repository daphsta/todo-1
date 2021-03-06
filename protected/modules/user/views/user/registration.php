<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Registration");
$this->breadcrumbs = array(
    UserModule::t("Registration"),
);
?>

<h1><?php echo UserModule::t("Registration"); ?></h1>

<?php if (Yii::app()->user->hasFlash('registration')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('registration'); ?>
    </div>
<?php else: ?>

    <div class="form">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'registration-form',
            'type' => 'horizontal',
            'enableAjaxValidation' => true,
//	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
//        'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array('class' => 'well',
                'enctype' => 'multipart/form-data',
            ),
                ));
        ?>





        <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

        <?php echo $form->errorSummary(array($model, $profile)); ?>

        <?php echo $form->textFieldRow($model, 'username', array('class' => 'span3', 'tip' => 'demo/demo or admin/admin')) ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('tip' => 'Minimal password length 4 symbols.', 'class' => 'span3')); ?>
        <?php echo $form->passwordFieldRow($model, 'verifyPassword', array('tip' => 'Minimal password length 4 symbols.', 'class' => 'span3')); ?>
        <?php echo $form->textFieldRow($model, 'email', array('class' => 'span3')) ?>


        <?php
        $profileFields = $profile->getFields();
        if ($profileFields) {
            foreach ($profileFields as $field) {
                ?>
                <?php
//                        $form->labelEx($profile,$field->varname); 
                ?>
                <?php
                if ($widgetEdit = $field->widgetEdit($profile)) {
                    echo $widgetEdit;
                } elseif ($field->range) {
                    echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
                } elseif ($field->field_type == "TEXT") {
                    echo$form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                } else {
                    echo $form->textFieldRow($profile, $field->varname, array('class' => 'span3'));
//                    echo $form->textField($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                }
                ?>
                <?php // echo $form->error($profile, $field->varname); ?>
                <?php
            }
        }
        ?>
        <?php if (UserModule::doCaptcha('registration')): ?>
        <?php echo $form->captchaRow($model, 'verifyCode'); ?>

        <p><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
            <br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
        <?php endif; ?>

        <?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> '.UserModule::t("Register"), array('class' => 'btn btn-primary', 'type' => 'submit')); ?>

        <?php $this->endWidget(); ?>
    </div><!-- form -->
<?php endif; ?>