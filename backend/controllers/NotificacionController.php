<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\Notificacion;
use common\models\search\NotificacionSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NotificacionController implements the CRUD actions for Notificacion model.
 */
class NotificacionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'error'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $valid_rol = User::ROLE_ADMIN;
                            return User::isRole($valid_rol) && User::isActive();
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Notificacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NotificacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->where('Notificacion.status <>'.Notificacion::STATUS_TRASH );
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTrash()
    {
        $searchModel = new NotificacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $dataProvider->query->where('Notificacion.status = '.Notificacion::STATUS_TRASH);
        
        return $this->render('trash', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionUnread($id)
    {
        $notificacion = Notificacion::findOne($id);
        $notificacion->status = Notificacion::STATUS_UNREAD;
        $notificacion->update();
        
        return $this->actionTrash();

    }

    /**
     * Displays a single Notificacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $notification = Notificacion::findOne($id);
        $notification->status = Notificacion::STATUS_READ;
        $notification->update();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionNoleidos()
    {
        $searchModel = new NotificacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->where('Notificacion.status = '.Notificacion::STATUS_UNREAD);
        return $this->render('unread', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Notificacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Notificacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idNotificacion]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    

    /**
     * Updates an existing Notificacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idNotificacion]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Notificacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $notificacion = Notificacion::findOne($id);
        $notificacion->status = Notificacion::STATUS_TRASH;
        $notificacion->update();

        return $this->redirect(['index']);
    }
    
   

    /**
     * Finds the Notificacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notificacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notificacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
