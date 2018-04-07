<?php

/* @var $this yii\web\View */

use app\models\Categorias;
$this->title = 'Makers pro';
?>


 
<div class="col-md-12">





<?php function Categoria($id){

$cat = Categorias::findOne($id);

return $cat->categoria;
}
?>





<div id="tabs" style="border:0px;">


<div class="btn-group" role="group" aria-label="...">

  <a href="index?id=17" type="button" class="btn btn-default" >Inicio</a>
    <a href="index?id=10" type="button" class="btn btn-default" >Auspicio</a>
      <a href="index?id=11" type="button" class="btn btn-default" >Educacion</a>
        <a href="index?id=13" type="button" class="btn btn-default" >Volumen</a>
          <a href="index?id=8" type="button" class="btn btn-default" >Demostraciones</a>
            <a href="index?id=img" type="button" class="btn btn-default" >Libros</a>
              <a href="index?id=15" type="button" class="btn btn-default" >Audios</a>
                <a href="index?id=16" type="button" class="btn btn-default" >Videos</a>



</div>



 <?php 
 
 if($_GET['id']=='img'){ ?>
<h1><?php echo Categoria(14) ?></h1>
<?php	
 }else{?>
<h1><?php echo Categoria($_GET['id']) ?></h1>
 <?php 
 }
 
 ?>

<?php if($_GET['id']!="img"){?>

   <div id="0">
 <link href="http://vjs.zencdn.net/5.9.2/video-js.css" rel="stylesheet">
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

     <?php foreach($video as $h){ ?>




 <div class="col-sm-4 col-lg-4 col-md-4" style="margin-bottom:10px; margin-top:10px;">

                        <div class="thumbnail">

                             <div align="center" class="embed-responsive embed-responsive-16by9" >
                               <video id="my-video" class="video-js" preload="metadata" controls >
                                 <source src="<?= Yii::$app->homeUrl; ?>../../admin/web/archivos/<?php echo $h->video;?>" type='video/mp4'>
                                 <p class="vjs-no-js"> To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                               </video>
                             
                            
                          </div>
                            <div class="caption">

                                <h4><a href="#" title=""> </a>
                                </h4>

                            </div>

                           <div class="btn btn-primary" >

								 <?php echo $h->video?>

						  </div>



                        </div>
                    </div>

 <?php } ?>




  




    </div>
    <?php } ?>
    <?php if($_GET['id']=="img"){?>
    <div  id="5">
     <?php foreach($video as $datol){ ?>




 <div class="col-sm-4 col-lg-4 col-md-4" style="margin-bottom:10px; margin-top:10px;">

                        <div class="thumbnail">



    <a href=" <?php echo $datol->url?>" target="_blank"> <img class="img-responsive" style="max-height:250px;" src="<?php echo $datol->img;?>" /></a>


                            <div class="caption">

                                <h4><a href="#" title=""> </a>
                                </h4>

                            </div>

                           <a href=" <?php echo $datol->url?>" target="_blank" class="btn btn-primary" >

								 <?php echo $datol->nombre?>

								 </a>



                        </div>
                    </div>

 <?php } ?></div>
    
   <?php } ?>
  
  </div>
  </div>


 <script src="http://vjs.zencdn.net/5.9.2/video.js"></script>
 
   <script>
  var vid = document.getElementById("my-video");
vid.autoplay = true;
vid.volume=0.0;
vid.load();
  </script>


