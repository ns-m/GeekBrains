<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\Widget;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
/* @var $form2 yii\bootstrap\Widget */
/* @var $viewModel EventCreateView */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_at')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'end_at')->textInput(['type' => 'date']) ?>
<!--    --><?//= $form->field($model, 'start_at')->widget(DatePicker::className(), [
//        'options' => [
//            'value' => Yii::$app->formatter->asDate($model->start_at),
//        ],
//        'pluginOptions' => [
//            'autoclose' => TRUE,
//            'format'    => 'dd-mm-yyyy',
//            'startDate' => 'd',
//        ]
//    ]) ?>

<!--    --><?//= $form->field($model, 'author_id')->dropDownList([
//    0 => 'Ничего',
//    1 => 'User 1',
//    2 => 'User 2',
//    ]);?>

<!--    --><?//= $form->field($model, 'author_id')->dropDownList($viewModel->getUserOptions());?>
    <?= $form->field($model, 'author_id')->dropDownList(
            User::find()->indexBy('id')->select('name', 'id')->column()
    );?>
<!--    --><?//= $form->field($model, 'users')->widget(Select2::class, [
//            'data' => $viewModel->getUserOptions(),
//            'options' => [
//                    'multiple' => true,
//            ],
//]);?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
