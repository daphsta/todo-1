<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    'About',
);
?>
<style type="text/css">
    p {
        text-align: justify;
    }
</style>
<h1>About</h1>

<p>The first thing when developing a web application is always about choosing the suitable framework. A framework help us to build the basic structure of the application and setting some standards as well as coding convention so that everyone in a team can work together easier.</p>

<div class="well">
    <div class="row-fluid">
        <div class="span4">
            <h3>Yii is a high-performance PHP framework</h3>
            <p>Yii is a high-performance framework. The graph below shows how efficient Yii is when compared with other popular PHP frameworks. In the graph, RPS stands for “request per second” which describes how many requests an application written in a framework can process per second. The higher the number, the more efficient a framework is. As we can see that Yii outperforms all other frameworks in this comparison. The performance advantage of Yii is especially significant when the widely used APC extension is enabled.
                <br><br>Performance alone is not the whole story (otherwise we should all use plain HTML or PHP). With such superior performance, Yii still provides a very rich feature set which can greatly improve your development efficiency.</p>
                <a href="http://www.yiiframework.com/performance/">The best PHP framework - Yii (Yes It Is!)</a><br>
        </div><!--/span-->
        <div class="span4">
            <h3>Why Yii is so Fast?</h3>
            <p>Yii is so much faster because it is using the lazy loading technique extensively. For example, it does not include a class file until the class is used for the first time; and it does not create an object until the object is accessed for the first time. Other frameworks suffer from the performance hit because they would enable a functionality (e.g. DB connection, user session) no matter it is used or not during a request.<br><br>
                <a href="http://www.phpframeworks.com/top-10-php-frameworks/">Top 10 Ranking PHP Frameworks</a><br>
                <a href="http://www.php-developers.org/blog/php/top10-php-frameworks-2012.html">TOP 10 PHP Frameworks 2012</a><br>
                <a href="http://php.dzone.com/news/top-10-php-frameworks">Top 10 PHP Frameworks | PHP Zone</a><br>
                <a href="http://www.phpzag.com/top-5-php-frameworks-2012/">Top 5 PHP Frameworks 2012</a><br>
            </p>
        </div><!--/span-->
        <div class="span4">
            <h3>Yii is highly OOP, well organized and extendable</h3>
            <p>It helps PHP beginner achieve the expected result using best practice code by calling one single method. It also help experienced coders save lot of time.</p>
            <p>At high level, Yii use common application design patter, MVC. It breaks an application into different components such as user component, database component, error handler component, log component, etc. With the component approach:</p>
            <ul>
                <li>You can add or remove components to make the application more extended or lighter.</li>
                <li>You can override a Yii component to modify or extend its features</li>
            </ul>
            <p>Yii extensions system allow community to add useful extensions such as a multi-file ajax upload, an image processor.</p>
        </div><!--/span-->
    </div>
    <div class="row-fluid">

        <div class="span4">
            <h3>Yii is for rapid development</h3>
            <p>Yii knows the common and tedious tasks most developers are tired to deal with.</p>
            <p>Use CHtml to write HTML form element faster and standardized. You will found it helpful when checking generated page with XHTML validator or when trying to reproduce user inputs in a form after submission.</p>
            <p>Use Yii code generator tool, available in both command line and GUI to generate MVC elements including Model, Views and Controller classes. The generator learn from table schema basic database constraints such as type, length, allow null, etc. so data will be validated automatically before saved.</p>
        </div>
        <div class="span4">
            <h3>Yii is configurable</h3>
            <p>All application components are configurable by passing an array of properties to initialize the component. A typical configuration task is configuring DB connection. Yii configuration array using keys as property names and values as property value which is easy to guess and learn the component insight be reading the code without referring to document.</p>
            <p>Yii has system-wide parameters allow you to add your custom parameters into your application and reduce hard-coded values.</p>
        </div>
        <div class="span4">
            <h3>Yii is ready for big and complex applications</h3>
            <p>In a big application you will find OOP’s concept of reusable component helpful. Reusable components make your application more manageable and testable. Developing an application with reusable components approach in mind is also more delightful and Yii supports you at different levels:</p>
            <ul>
                <li>Write independent utility classes so you can use them as helps in different projects and step by step make the classes bug-free and speedy</li>
                <li>Add in library that your team or company use frequently like PDF generator, CSV importer, Image processor</li>
                <li>Override and extend basic application components such as <strong>UrlManager</strong>, <strong>CWebApplication</strong>, <strong>CController</strong>. As a framework, Yii has to be generic in implementing these components but depend you the type of web applications your team or company build up, you can customize the components to best fit your needs.</li>
                <li>Write widgets to show common HTML content and widget for common used forms such as login form, registration form, contact form, etc.</li>
                <li>Break your application into modules so that common modules such as user management, back office, etc. can be reuse in other projects.</li>
            </ul>
            <p>Data manipulation is usually the major work in an application. Yii supports different DBMS system and also support multiple databases.</p>
            <p>There are also two options for data manipulation. You can use <strong>ActiveRecord</strong> to deal with databases whose schemas are very likely to be changed many times during development time.&nbsp; You can also use your optimized SQL commands to improve performance. If you do not really optimize SQL command but still think that SQL is faster than <strong>ActiveRecord</strong>, you can try caching DB schema.</p>
            <p>In a complex application, Yii provide additional components to deal with advanced requirements:</p>
            <ul>
                <li>Log and error handler components help you log message, track the execution and handler errors the way you want, for example, sending email to someone anytime an error occurs.</li>
                <li>There is user manager component to manage user session and login/logout process.</li>
                <li>Yii also has 2 levels of authentication. For quick and simple authentication, you can use filters which are run before a controller action. Your filter can allow or deny user to execute an action depend on whether they are logged in or not. For complicated application which needs roles and role base access control, Yii provide RBAC authentication system.</li>
                <li>Different types of caches are available in Yii. You can use <strong>CMemCache</strong>, <strong>CApcCache</strong> or <strong>CDbCache</strong>. The other cache extensions are <strong>EAccelerator, XCache, ZendDataCache</strong>. Yii provides you mechanism to cache data (variables) or generated content. You can cache part of the pages or you can cache the whole page.</li>
                <li>Yii support internationalization and localization with message translation, data formatters, different views per language</li>
            </ul>
            <p>There are many other things we do not mention is this overview of Yii such as theming, template engine, security, web service or Ajax form, object behavior, event-driven programming. All of these capacity help to make Yii a very ideal choice for your web application framework.</p>
        </div>
    </div>
</div>
</div>    