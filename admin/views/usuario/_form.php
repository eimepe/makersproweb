<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'austiciador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'platino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'esmeralda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diamante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList(
								
								['1'=>'Activo' , '0'=>'Inactivo']);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
