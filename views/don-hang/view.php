<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DonHang */

$this->title = $model->ma_don_hang;
$this->params['breadcrumbs'][] = ['label' => 'Don Hangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="don-hang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ma_don_hang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ma_don_hang], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ma_don_hang',
            'tenKH',
            'dia_chi',
            'phone',
            'email:email',
            'tong_tien',
            'status',
        ],
    ]) ?>

</div>
