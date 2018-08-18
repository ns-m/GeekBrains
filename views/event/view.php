<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

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

    <?php if ($this->beginCache('event-view-' . $model->id, ['duration'=>10])):?>
    <div>
        Current time:
        <?=date('d.m.Y H:i:s');?>
    </div>
    <?=$this->endCache();?>
    <?php endif;?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'start_at',
            'end_at',
            'created_at',
            'updated_at',
            'author_id',
        ],
    ]) ?>

    <?=\kmv\foobar\AutoloadExample::widget([
            'db' => \Yii::$app->db,
    ]);?>

</div>
