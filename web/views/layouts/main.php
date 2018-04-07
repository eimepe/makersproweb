<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Puntajesvideos;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<?= Html::csrfMetaTags() ?>
<style>


.navbar-inverse .navbar-nav > li > a {
	color:#ffffff !important;
}

.navbar-inverse .navbar-brand{
	color:#ffffff !important;
}

    nav.navbar {

		color:#ffffff !important;
		box-shadow: 2px 2px 5px #999;
 	  background:#cc181e;

}
.navbar-brand {
	padding:0px !important;
}





    </style>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>





<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/logo.png', ['alt'=>"Makers pro"]),
		//'brandLabel' => 'Makers Pro',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);?>
    <div class="navbar-left navbar-nav"><h4> &nbsp;&nbsp;Makers Pro</h4></div>
    <?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index'], 'visible' => !Yii::$app->user->isGuest],

			 [
            'label' => 'Cursos',
            'items' => [






			    ['label' => 'Despierta', 'url' =>  ['/site/about', 'id' => 1, 'ida' => 0], 'visible' => !Yii::$app->user->isGuest],
                 ['label' => 'Define tu sueño', 'url' =>  ['/site/about', 'id' => 2, 'ida' => 1], 'visible' => !Yii::$app->user->isGuest],
				  ['label' => 'Activa tu Neurona', 'url' =>  ['/site/about', 'id' => 3,'ida' => 2], 'visible' => !Yii::$app->user->isGuest],

					 ['label' => 'Contacta', 'url' =>  ['/site/abouts', 'id' => 4,'ida' => 3], 'visible' => !Yii::$app->user->isGuest],
				    ['label' => 'Plan', 'url' =>  ['/site/abouts', 'id' => 5,'ida' => 4], 'visible' => !Yii::$app->user->isGuest],
					 ['label' => 'Seguimiento', 'url' =>  ['/site/abouts', 'id' => 6,'ida' => 5], 'visible' => !Yii::$app->user->isGuest],
					  ['label' => 'Cierre', 'url' =>  ['/site/abouts', 'id' => 7,'ida' => 6], 'visible' => !Yii::$app->user->isGuest],
					   ['label' => 'Estrategia', 'url' =>  ['/site/abouts', 'id' => 9,'ida' => 7], 'visible' => !Yii::$app->user->isGuest],
					  ['label' => 'Proposito', 'url' =>  ['/site/abouts', 'id' => 12,'ida' => 9], 'visible' => !Yii::$app->user->isGuest]

            ]
       , 'visible' => !Yii::$app->user->isGuest ],


            Yii::$app->user->isGuest ?
                ['label' => 'Iniciar sesion', 'url' => ['/site/login']] :
                [
                    'label' => 'Salir (' . Yii::$app->user->identity->nombre . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>



        <?= $content ?>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?>  </p>


        <p class="pull-right">      </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
