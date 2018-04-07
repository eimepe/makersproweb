<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    
    <table class="table table-striped">
<tr>
<td><strong>ID</strong></td>
<td><?= $model->id?></td>
<tr>
<td><strong>CODIGO</strong></td>
<td><?= $model->codigo?></td>
</tr>
<tr>
<td><strong>CLAVE</strong></td>
<td><?= $model->clave?></td>
</tr>
<tr>
<td><strong>NOMBRE</strong></td>
<td><?= $model->nombre?></td>
</tr>
<tr>
<td><strong>CC</strong></td>
<td><?= $model->cc?></td>
</tr>
<tr>
<td><strong>TEL</strong></td>
<td><?= $model->tel?></td>
</tr>
<tr>
<td><strong>DIRECCION</strong></td>
<td><?= $model->direccion?></td>
</tr>
<tr>
<td><strong>CORREO</strong></td>
<td><?= $model->correo?></td>
</tr>
<tr>
<td><strong>AUSPICIADOR</strong></td>
<td><?= $model->austiciador?></td>
</tr>
<tr>
<td><strong>PLATINO</strong></td>
<td><?= $model->platino?></td>
</tr>
<tr>
<td><strong>ESMERALDA</strong></td>
<td><?= $model->esmeralda?></td>
</tr>
<tr>
<td><strong>DIAMANTE</strong></td>
<td><?= $model->diamante?></td>
</tr>
<tr>
<td><strong>EDAD</strong></td>
<td><?= $model->edad?></td>
</tr>
<tr>
<td><strong>ESTADO</strong></td>
<td><?php if($model->estado ==1 ){
	
	echo "Activo";
}else{
	echo "Inactivo";
}?></td>
</tr>

</table>

</div>
