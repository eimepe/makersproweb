<?php

namespace app\controllers;

use Yii;
use app\models\Img;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImgController implements the CRUD actions for Img model.
 */
class ImgController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Img models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Img::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Img model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Img model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreate()
    {
        $model = new Img();
		
		$msg = null;

		
		
		if ($model->load(Yii::$app->request->post()))

 {

  $model->file = UploadedFile::getInstances($model, 'file');

 

  if ($model->file && $model->validate()) {
	  
	 
	  
	  

   foreach ($model->file as $file) {
	   
	    $modelv = Img::find()->where(['img' => $file->baseName . '.' . $file->extension])->one();;
	   
	    
	   
	   if(!isset($modelv->id)){
	   
	   $model->img ='http://makerspro.com.co/admin/web/archivos/'. $file->baseName . '.' . $file->extension;
	   $model->save();

    $file->saveAs('archivos/' . $file->baseName . '.' . $file->extension);

    $msg = "<p><strong class='label label-info'>Enhorabuena, subida realizada con éxito</strong></p>";
	 
            return $this->redirect(['view', 'id' => $model->id]);
	   }else{
		    $msg = "<p><strong class='label label-info'>Un archivo con el mismo nombre ya Existe</strong></p>";
   }

   }
   
 

  }

 }

		
		
		
		

   
       
            return $this->render('create', [
                'model' => $model, 'msg'=>$msg
            ]);
        
    }

    /**
     * Updates an existing Img model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
	
    {
		
		
        $model = $this->findModel($id);

        $msg = null;

		
		
		if ($model->load(Yii::$app->request->post()))

 {

  $model->file = UploadedFile::getInstances($model, 'file');


 

  if ($model->file && $model->validate()) {
	  
	 
	  
	  

   foreach ($model->file as $file) {
	   
	   $modelv = Img::find()->where(['img' => $file->baseName . '.' . $file->extension])->one();;
	   
	    
	   
	   if(!isset($modelv->id)){
	 
	   
	   $model->img = 'http://makerspro.com.co/admin/web/archivos/'.$file->baseName . '.' . $file->extension;
	   $model->save();

    $file->saveAs('archivos/' . $file->baseName . '.' . $file->extension);

    $msg = "<p><strong class='label label-info'>Enhorabuena, subida realizada con éxito</strong></p>";
	 
            return $this->redirect(['view', 'id' => $model->id]);
			
			  }else{
				  
				   $msg = "<p><strong class='label label-info'>Un archivo con el mismo nombre ya Existe</strong></p>";
			  }

   }
   
 

  }

 }
            return $this->render('update', [
                'model' => $model, 'msg'=>$msg
            ]);
        
    }
    /**
     * Deletes an existing Img model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Img model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Img the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Img::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
