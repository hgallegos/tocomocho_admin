<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ReseniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resenias';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="resenia-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns_autover.php'),
            'toolbar'=> [
                ['content'=>

                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> Listado de Reseñas',
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<a href="create_ver?idVehiculo=<?= $idVehiculo ?>" class="btn btn-primary">
    Crear Reseña
</a>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
