<?php
/* @var $this TodoController */
/* @var $data Todo */

Yii::app()->clientScript->registerCoreScript('jquery');
$js = 'var delUrl = "' . $this->createUrl('todo/delete') . '/id/"; ' .
        'var doneUrl = "' . $this->createUrl('todo/done') . '"; ' .
        'var undoUrl = "' . $this->createUrl('todo/undo') . '"; ';
Yii::app()->clientScript->registerScript('js1', $js, CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/script.js');

if ($data->status == 0) {
    $done = 'done';
    $doneOptions = array(
        'style' => 'display: none',
        'data-id' => $data->id
    );
    $undoOptions = array(
        'data-id' => $data->id
    );
} else {
    $done = '';
    $doneOptions = array(
        'data-id' => $data->id
    );
    $undoOptions = array(
        'style' => 'display: none',
        'data-id' => $data->id
    );
}
?>

<div class="well">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <div class="btn-toolbar todoBody">
        <h2 class="todoText <?= $done ?>">
            <?php echo CHtml::encode($data->todo); ?>
        </h2>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'label' => 'Edit',
            'url' => Yii::app()->createUrl('todo/update', array('id' => $data->id)),
        ));
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'label' => 'Done',
            'url' => '#',
            'htmlOptions' => $doneOptions,
        ));
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'inverse', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'label' => 'Undo',
            'url' => '#',
            'htmlOptions' => $undoOptions,
        ));
        ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'label' => 'Delete',
            'url' => Yii::app()->createUrl('todo/delete', array('id' => $data->id)),
            'htmlOptions' => array('data-id' => $data->id),
        ));
        ?>
    </div>

</div>