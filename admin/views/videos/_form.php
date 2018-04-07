<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categorias;
use app\models\Subcategorias;
use app\models\Ultcategoria;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Videos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="videos-form">

<?= $msg ?>


   <?php $form = ActiveForm::begin([
     "method" => "post",
     "enableClientValidation" => false,
     "options" => ["enctype" => "multipart/form-data"],

     ]); ?>
     
     


    <?= $form->field($model, "file[]")->fileInput(['multiple' => true]) ?>

 

<?php 
//use app\models\Country;
$countries = Categorias::find()->orderBy(['posicion' => SORT_ASC])->all();

//use yii\helpers\ArrayHelper;
$listData=ArrayHelper::map($countries,'id','categoria');

echo $form->field($model, 'categoria')->dropDownList(
								$listData, 
								['prompt'=>'Select...']);
?>


<?php 
//use app\models\Country;
$countrie = Subcategorias::find()->orderBy(['id' => SORT_ASC])->all();

//use yii\helpers\ArrayHelper;
$listDatas=ArrayHelper::map($countrie,'id','nombre');

echo $form->field($model, 'subcategoria')->dropDownList(
								$listDatas, 
								['prompt'=>'Select...']);
?>


<?php 
//use app\models\Country;
$countrie = Ultcategoria::find()->orderBy(['id' => SORT_ASC])->all();

//use yii\helpers\ArrayHelper;
$listDatas=ArrayHelper::map($countrie,'id','nombre');

echo $form->field($model, 'ultcategoria')->dropDownList(
								$listDatas, 
								['prompt'=>'Select...']);
?>



  <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />  

    

    <div class="form-group">
      <?= Html::submitButton("Subir", ["class" => "btn btn-primary"]) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
