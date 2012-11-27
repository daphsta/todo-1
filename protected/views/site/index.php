<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<div class="hero-unit">
    <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
    <p>This To-do web application is implemented using Yii Framework</p>
    <p>Features the following technologies:</p>
    <ul>
        <li>
            <a href="http://www.yiiframework.com">Yii Framework</a>
            <h2>The <span style="color: #D8582B">Fast</span>, <span style="color: #16A314">Secure</span> and <span style="color: #3B6FBA">Professional</span> PHP Framework</h2>
        </li>
        <li>
            <a href="http://www.cniska.net/yii-bootstrap/">Yii bootstrap extension.</a>
            <p>This extension include Twitter's bootstrap for RWD (Responsive Web Design)</p>
        </li>
        <li>
            <a href="http://www.yiiframework.com/extension/yii-user/">yii-user extension.</a>
            <p>Yii PHP Framework extension for registration and management users accounts.</p>
        </li>
    </ul>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'List / Edit Todos',
        'type' => 'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'size' => 'large', // null, 'large', 'small' or 'mini'
    ));
    ?>
</div>
