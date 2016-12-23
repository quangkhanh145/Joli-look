<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SanPhamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'San Phams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="san-pham-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create San Pham', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_danhmuc',
            'mau_sac',
            'image',
            'so_luong',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
