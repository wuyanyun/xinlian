<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'open_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_id')->textInput() ?>

    <?= $form->field($model, 'skill_disease')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_card_front')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_card_back')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_certification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'practicing_certificate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highest_professional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <?= $form->field($model, 'verify_time')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'show_index')->textInput() ?>

    <?= $form->field($model, 'mobile')->textInput() ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'province_id')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'area_id')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'practice_experience')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'academic_post')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>