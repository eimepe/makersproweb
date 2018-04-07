<?php

use yii\widgets\ActiveForm; 
?><div class="col-sm-12 col-lg-12 col-md-12">

    <div class="jumbotron">
       

       
    </div>
 <h2><?php echo $preguntas->pregunta?></h2>
    <div class="body-content">
    
<?php

//$form = ActiveForm::begin(); //Default Active Form begin
$form = ActiveForm::begin([
    'id' => 'active-form',
    'options' => [
				'class' => 'form-horizontal',
				'enctype' => 'multipart/form-data'
				],
]);?>
<h2>Respuesta</h2>
<p>
  <label>
    <input type="radio" name="respuesta" value="a" id="RadioGroup1_0">
    <?php echo $preguntas->a?></label>
  <br>
  <label>
    <input type="radio" name="respuesta" value="b" id="RadioGroup1_1">
    <?php echo $preguntas->b?></label>
  <br>
  <label>
    <input type="radio" name="respuesta" value="c" id="RadioGroup1_2">
    <?php echo $preguntas->c?></label>
  <br>
  <label>
    <input type="radio" name="respuesta" value="d" id="RadioGroup1_3">
    <?php echo $preguntas->d?></label>
  <br>
</p>

   <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />



<input class="btn btn-danger" type="submit" value="Responder">
<?php 


ActiveForm::end();
?>

<?php 
$puntos = $_GET['puntos'];
?>
<script>
function pregunta()
{
if(confirm("Respuesta Correcta Desea Continuar"))
document.location.href="preguntacinco?id=<?php echo $preguntas->idvideo?>&puntos=<?php echo $puntos+100?>";
else
document.location.href="index"; 
}


function pregunta2()
{
if(confirm("Respuesta Incorrecta Desea Continuar"))
document.location.href="preguntacinco?id=<?php echo $preguntas->idvideo?>&puntos=<?php echo $puntos?>";
else
document.location.href="index"; 
}
</script> 

    
    <?php if($res =="1"){?>
		<script>pregunta();</script>
		<?php
	}elseif($res=="2"){
		
		echo $res;?>
		<script>pregunta2();</script>
	<?php }else{
		echo $res;
	}?>
    </div>
    </div>
    
    