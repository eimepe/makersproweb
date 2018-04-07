<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Preguntas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="preguntas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pregunta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'idvideo')->textInput(['maxlength' => true, 'value'=>$ids])?>

    <?= $form->field($model, 'respuesta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'npregunta')->dropDownList(
								
								['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
