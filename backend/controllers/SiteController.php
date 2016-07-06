<?php
namespace backend\controllers;

use common\models\Notificacion;
use common\models\Resenia;
use common\models\User;
use common\models\Usuario;
use common\models\Vehiculo;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'],
                'rules' => [
                    [
                        'actions' => ['login'],
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $numberOfUsers = Usuario::find()
            ->where(['status' => Usuario::STATUS_ACTIVE])
            ->count();
       $numberOfCars = Vehiculo::find()
            ->count();
        $numberOfReviews = Resenia::find()
            ->count();
        $numberOfNotify = Notificacion::find()
            ->count();
        $lastUsers = Usuario::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(8)->all();

        $lastReviews = Resenia::find()
            ->orderBy(['idComentario' =>SORT_DESC])
            ->limit(10)->all();

        $lastCars= Vehiculo::find()
            ->orderBy(['anio' =>SORT_DESC])
            ->limit(8)->all();
        

        return $this->render('index', array('numberOfUsers' => $numberOfUsers,
            'numberOfReviews' => $numberOfReviews,
            'numberOfCars' => $numberOfCars,
            'numberOfNotify' => $numberOfNotify,
            'lastUsers' => $lastUsers,
            'lastCars' => $lastCars,
            'lastReviews' => $lastReviews));
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
