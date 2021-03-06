<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">
      
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">                

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <?= Html::a('Sign Out', ['site/logout'], ['class' => 'btn btn-default','data-method'=>'post']) ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
