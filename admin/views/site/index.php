<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Dropdown;
use yii\bootstrap\Button;
use yii\bootstrap\NavBar;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

$this->title = 'Videos';
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>&nbsp;</h1>
    </div>
    <div class="body-content">
      <div class="row">
      

      
      
      <?php 
echo Nav::widget([

    'options'=>['class'=>'navbar-inverse'], 
    'items' => [
  ['label' => 'USUARIOS', 'url' => ['usuario/index']],
        ['label' => 'VIDEOS', 'url' => ['videos/index']],
		['label' => 'IMG libros', 'url' => ['img/index']],

       
    ],
  ]);
	  ?>
      



            </div>

    </div>
</div>
