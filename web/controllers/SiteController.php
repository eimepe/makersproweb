<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Videos;
use app\models\Puntajesvideos;
use app\models\Preguntas;
use app\models\Img;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}else{
			$id = 17;
		}

		if($id==17){
			$video=Videos::find()->where(['categoria' => 17])->all();
		}elseif($id==10){
			$video=Videos::find()->where(['categoria' => 10])->all();
		}elseif($id==11){
			$video=Videos::find()->where(['categoria' => 11])->all();
		}elseif($id == 13){
			$video=Videos::find()->where(['categoria' => 13])->all();
		}elseif($id == 8){
			$video=Videos::find()->where(['categoria' => 8])->all();
		}elseif($id == 15){
			$video=Videos::find()->where(['categoria' => 15])->all();
		}elseif($id == 16){
			$video=Videos::find()->where(['categoria' => 16])->all();
		}elseif($id == img){
			$video=Img::find()->all();
		}


        return $this->render('index',['video' => $video]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['index']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout($id, $ida)
    {

		$id = $_GET['id'];
		$ida = $_GET['ida'];
		$videos = Videos::find()->where(['categoria' => $id])->all();
		$puntajes = Puntajesvideos::find()->where(['idcategoria' => $id, 'iduser'=>Yii::$app->user->identity->id])->all();





        return $this->render('about',['videos'=>$videos, 'puntajes'=>$puntajes, 'ida'=>$ida]);
    }

    public function actionAbouts($id, $ida)
    {

		$id = $_GET['id'];
		$ida = $_GET['ida'];
		$videos = Videos::find()->where(['categoria' => $id])->all();
		$puntajes = Puntajesvideos::find()->where(['idcategoria' => $id, 'iduser'=>Yii::$app->user->identity->id])->all();



		

        return $this->render('abouts',['videos'=>$videos, 'puntajes'=>$puntajes, 'ida'=>$ida]);
    }

	    public function actionPreguntauno($id)
    {
		$res = "";

		if(isset($_POST['respuesta'])){
			$respuestas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>1])->One();

			if($respuestas->respuesta == $_POST['respuesta']){

			$res = "1";

			}else{
				$res = "2";

			}

		}

		$id = $_GET['id'];

		$preguntas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>1])->One();





        return $this->render('preguntauno',['preguntas'=>$preguntas, 'id'=>$id, 'res'=>$res]);
    }


	    public function actionPreguntados($id)
    {

			$res = "";

		if(isset($_POST['respuesta'])){
			$respuestas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>2])->One();

			if($respuestas->respuesta == $_POST['respuesta']){

			$res = "1";

			}else{
				$res = "2";

			}

		}

		$id = $_GET['id'];

		$preguntas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>2])->One();





        return $this->render('preguntados',['preguntas'=>$preguntas, 'id'=>$id, 'res'=>$res]);
    }


	    public function actionPreguntatres($id)
    {


			$res = "";

		if(isset($_POST['respuesta'])){
			$respuestas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>3])->One();

			if($respuestas->respuesta == $_POST['respuesta']){

			$res = "1";

			}else{
				$res = "2";

			}

		}

		$id = $_GET['id'];

		$preguntas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>3])->One();





        return $this->render('preguntatres',['preguntas'=>$preguntas, 'id'=>$id, 'res'=>$res]);
    }


	    public function actionPreguntacuatro($id)
    {


			$res = "";

		if(isset($_POST['respuesta'])){
			$respuestas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>4])->One();

			if($respuestas->respuesta == $_POST['respuesta']){

			$res = "1";

			}else{
				$res = "2";

			}

		}

		$id = $_GET['id'];

		$preguntas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>4])->One();





        return $this->render('preguntacuatro',['preguntas'=>$preguntas, 'id'=>$id, 'res'=>$res]);
    }



	    public function actionPreguntacinco($id)
    {

			$res = "";

		if(isset($_POST['respuesta'])){
			$respuestas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>5])->One();

			if($respuestas->respuesta == $_POST['respuesta']){

			$res = "1";

			}else{
				$res = "2";

			}

		}

		$id = $_GET['id'];

		$preguntas = Preguntas::find()->where(['idvideo'=>$id, 'npregunta'=>5])->One();





        return $this->render('preguntacinco',['preguntas'=>$preguntas, 'id'=>$id, 'res'=>$res]);
    }
		    public function actionFinalizar($id)
    {
		$id = $_GET['id'];
		$puntaje = $_GET['puntos'];

		$cate = Videos::findOne($id);
		$puntos =Puntajesvideos::find()->where(['idvideo'=>$id, 'iduser'=>Yii::$app->user->identity->id])->one();

		if($puntos->id !=''){
			$puntos->puntaje = $puntaje;
			if($puntos->save()){
			return $this->goHome();
			}

		}else{
			$model = new Puntajesvideos;
			$model->iduser = Yii::$app->user->identity->id;
			$model->idvideo = $id;
			$model->puntaje = $puntaje;
			$model->idcategoria = $cate->categoria;
			if($model->save()) {
         return $this->goHome();
        }else{
var_dump($model);exit;}

		}






    }

}
