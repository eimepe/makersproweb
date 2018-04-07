<div class="col-sm-12 col-lg-12 col-md-12">

    <div class="jumbotron">
       

       
    </div>
 <h2><?php echo $preguntas->pregunta?></h2>
    <div class="body-content">
    
 <?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//$form = ActiveForm::begin(); //Default Active Form begin
$form = ActiveForm::begin([
    'id' => 'active-form',
    'options' => [
				'class' => 'form-horizontal',
				'enctype' => 'multipart/form-data'
				],
]);?>


<?= $form->field($preguntas, 'respuesta')->radioList(array('a'=>$preguntas->a,'b'=>$preguntas->b,'c'=>$preguntas->c,'d'=>$preguntas->d)); ?>



<?php 


ActiveForm::end();
?>
    
    <?php echo $res ?>
    </div>
    </div>