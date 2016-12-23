<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DonHang */

$this->title = 'Update Don Hang: ' . $model->ma_don_hang;
$this->params['breadcrumbs'][] = ['label' => 'Don Hangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ma_don_hang, 'url' => ['view', 'id' => $model->ma_don_hang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="don-hang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
