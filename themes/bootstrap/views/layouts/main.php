<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <link media="screen" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css"  />

    </head>

    <body>
        <div id="wrapper"  style="display:block;">
            <div id="header" class="container-fluid">
                <div id="logo"><h1><?php echo CHtml::encode(Yii::app()->name); ?></h1></div>
            </div><!-- header -->

            <div id="mainmenu">
                <?php
                $this->widget('bootstrap.widgets.TbNavbar', array(
                    'brand' => false,
                    'fixed' => false,
                    'fluid' => true,
                    'collapse' => true,
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'items' => array(
                                array('label' => 'Home', 'icon'=>'home', 'url' => array('/site/index')),
                                array('label' => 'Todos', 'icon'=>'book', 'url' => array('/todo'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'About', 'icon'=>'flag', 'url' => array('/site/page', 'view' => 'about')),
                                array('icon'=>'user', 'url' => Yii::app()->getModule('user')->loginUrl, 'label' => Yii::app()->getModule('user')->t("Login"), 'visible' => Yii::app()->user->isGuest),
                                array('url' => Yii::app()->getModule('user')->registrationUrl, 'label' => Yii::app()->getModule('user')->t("Register"), 'visible' => Yii::app()->user->isGuest),
                                array('icon'=>'user', 'url' => Yii::app()->getModule('user')->profileUrl, 'label' => Yii::app()->getModule('user')->t("Profile"), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Contact', 'url' => array('/site/contact')),
                                array('icon'=>'exit', 'url' => Yii::app()->getModule('user')->logoutUrl, 'label' => Yii::app()->getModule('user')->t("Logout") . ' (' . Yii::app()->user->name . ')', 'visible' => !Yii::app()->user->isGuest),),
                        ),
                    ),
                ));
                ?>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs) && !empty($this->breadcrumbs)): ?>
                <div id="breadcrumbs-container">
                    <?php
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?>
                    <div class="clear"></div>
                </div>
            <?php endif ?>
            <div id="content">
                <div class="container-fluid">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="container-fluid">
                Copyright &copy; <?php echo date('Y'); ?> by GeN Creations.<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div>
        </div><!-- footer -->
    </body>
</html>
