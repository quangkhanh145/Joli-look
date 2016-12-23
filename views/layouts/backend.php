<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=Html::csrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <style>
        body {
          font-family: 'Roboto';
        }

        #left-sidebar, #main-content {
          height: 500px;
          border: 1px solid red;
          margin-bottom: 50px;
        }

        #footer {
          text-align: center;
        }
      </style>
    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>

<div class="wrap">
        <div class="container">
        <?=Breadcrumbs::widget([
	'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])?>
        <?=$content?>
    </div>
</div>

<footer id="footer">
    <div class="container">
        <p>All rights reserved by Jolilook</p>
    </div>
</footer>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
