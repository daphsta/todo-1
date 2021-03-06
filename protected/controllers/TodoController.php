<?php

class TodoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
//            array('allow', // allow all users to perform 'index' and 'view' actions
//                'actions' => array('index', 'view'),
//                'users' => array('*'),
//            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete', 'done', 'undo'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Todo;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Todo'])) {
            $model->user_id = Yii::app()->user->id;
//            $model->status = 1;
            $model->todo = $_POST['Todo']['todo'];
            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->id));
                $this->redirect(array('index'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Todo'])) {
            $model->attributes = $_POST['Todo'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Set todo status to done (status=0)
     */
    public function actionDone() {
        $user_id = Yii::app()->user->id;

        if (Yii::app()->user->isAdmin())
            $model = $this->loadModel($_POST['id']);
        else
            $model = Todo::model()->findByAttributes(array(
                'user_id' => $user_id,
                'id' => $_POST['id']
                    ));
        $model->status = 0;
        $model->save();

        Yii::app()->end();
    }

    /**
     * Set todo status to undone (status=1)
     */
    public function actionUndo() {
        $user_id = Yii::app()->user->id;

        if (Yii::app()->user->isAdmin())
            $model = $this->loadModel($_POST['id']);
        else
            $model = Todo::model()->findByAttributes(array(
                'user_id' => $user_id,
                'id' => $_POST['id']
                    ));
        $model->status = 1;
        $model->save();

        Yii::app()->end();
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $user_id = Yii::app()->user->id;

        if (Yii::app()->user->isAdmin())
            $this->loadModel($_POST['id'])->delete();
        else
            Todo::model()->findByAttributes(array(
                'user_id' => $user_id,
                'id' => $_POST['id']
            ))->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all todos for current user.
     */
    public function actionIndex() {
        $criteria = array(
            'order' => 'id DESC',
            'condition' => 'user_id = ' . Yii::app()->user->id,
        );
        $dataProvider = new CActiveDataProvider('Todo', array('criteria' => $criteria));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Todo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Todo']))
            $model->attributes = $_GET['Todo'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Todo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'todo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
