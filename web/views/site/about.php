<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Videos;
use app\models\Puntajesvideos;
use app\models\Categorias;

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>





<?php 
$cantidadv = Videos::find()->where(['categoria' =>$ida])->all();

  $cuenta = count($cantidadv);

$puntajeminimo = $cuenta *400;

$model000=Puntajesvideos::find()->where(['iduser' =>Yii::$app->user->identity->id, 'idcategoria'=>$ida])->all();
$putk = 0;

foreach($model000 as $puntajeeeee){
$putk = $putk + $puntajeeeee->puntaje;

}


$cates = Categorias::find()->where(['id' =>$_GET['id']])->One();
?>


<?php  if($ida ==0){?>


<div class="col-sm-12 col-lg-12 col-md-12">

    <div class="jumbotron">
        <h3> <?php echo  $cates->categoria?></h3>

       
    </div>

    <div class="body-content">


<?php $numerovideo = 0?>
<?php $puntos = 0?>

<?php foreach($puntajes as $datos){ 

 $puntos = $puntos+$datos['puntaje'];

?>



<?php }?>
<div class="row">
 
 <?php foreach($videos as $dato){ ?>
 

 
 
 <div class="col-sm-4 col-lg-4 col-md-4" style="margin-bottom:10px; margin-top:10px; max-height:300px; min-height:300px;">
                    
                        <div class="thumbnail">
                        
                             <div align="center" class="embed-responsive embed-responsive-16by9">
   <video class="embed-responsive-item" controls >
     <source src="http://makerspro.com.co/admin/web/archivos/<?php if($puntos >= $v = $numerovideo++ * 400){
									echo $dato->video;
									
									
								
								}else{echo 'Video1'; $respuesta = "No tiene Suficientes puntos para ver este video";};?>" type=video/mp4>
   </video>
 </div>
                            <div class="caption">
                                
                                <h4><a href="#" title=""> </a>
                                </h4>
                               
                            </div>
                            
                            <?php if(isset($respuesta)){echo $respuesta;}else{ echo'     <div class="ratings" style=" margin-bottom:5px;">
                                 <div class="btn btn-primary" >
								 
								 '. $dato->video.'
								 
								 </div>
								 
								 <a href="preguntauno?id='.$dato->id.'"> <div class="btn btn-primary" >
								 
								Responder
								 
								 </div></a>
                            
                            </div>';} ?>
                   
                            
                            
                        </div>
                    </div>
                  
 
 <?php } ?>

  </div>
<?php }elseif($putk !=0 && $putk >= $puntajeminimo){?>
<div class="col-sm-12 col-lg-12 col-md-12">

    <div class="jumbotron">
        <h3><?php echo $cates->categoria?></h3>

       
    </div>

    <div class="body-content">


<?php $numerovideo = 0?>
<?php $puntos = 0?>

<?php foreach($puntajes as $datos){ 

 $puntos = $puntos+$datos['puntaje'];

?>



<?php }?>

 
 <?php foreach($videos as $dato){ ?>
 

 
 
 <div class="col-sm-4 col-lg-4 col-md-4" style="margin-bottom:10px; margin-top:10px;">
                    
                        <div class="thumbnail">
                        
                             <div align="center" class="embed-responsive embed-responsive-16by9">
   <video class="embed-responsive-item" controls >
     <source src="http://makerspro.com.co/admin/web/archivos/<?php if($puntos >= $v = $numerovideo++ * 400){
									echo $dato->video;
									
									
								
								}else{echo 'Video1'; $respuesta = "No tiene Suficientes puntos para ver este video";};?>" type=video/mp4>
   </video>
 </div>
                            <div class="caption">
                                
                                <h4><a href="#" title=""> </a>
                                </h4>
                               
                            </div>
                            
                            <?php if(isset($respuesta)){echo $respuesta;}else{ echo'     <div class="ratings" style=" margin-bottom:5px;">
                                 <div class="btn btn-primary" >
								 
								 '. $dato->video.'
								 
								 </div>
								 
								 <a href="preguntauno?id='.$dato->id.'"> <div class="btn btn-primary" >
								 
								Responder
								 
								 </div></a>
                            
                            </div>';} ?>
                   
                            
                            
                        </div>
                    </div>
 
 <?php } ?>

 <?php }else{echo "<h1>No tienen Suficientes Puntos para los Videos de esta categoria</h1>";}?>
 
  </div>

</div>
