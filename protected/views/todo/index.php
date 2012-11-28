<?php
/* @var $this TodoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Todos',
);

$this->menu=array(
	array('label'=>'Create Todo', 'url'=>array('create')),
	array('label'=>'Manage Todo', 'url'=>array('admin')),
);
?>

<h1>Todos</h1>

<?php if (!$dataProvider->itemCount) : ?>
<div class="well">
    <p>No todos found</p>
<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Create Todo',
        'url' => array('/todo/create'),
        'type' => 'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'large', // null, 'large', 'small' or 'mini'
    ));
?>    
</div>
<?php else: 
//if (is_array($dataProvider)) echo 'epaaaa';
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
endif;
?>
