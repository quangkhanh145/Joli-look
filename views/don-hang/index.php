<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DonHangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đơn hàng';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="don-hang-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::a('Tạo đơn hàng', ['create'], ['class' => 'btn btn-success'])?>
    </p>
    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		'Mã đon hàng',
		'Ten khách hàng ',
		'Địa chỉ',
		'Phone',
		'Email:email',
		// 'tong_tien',
		// 'status',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
</div>
