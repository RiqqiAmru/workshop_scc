<?php

use app\models\Pelanggan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
/* @var $form ActiveForm */
?>
<div class="penjualan-form_header">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_nota')->textInput(['value' => time(), 'readonly' => 'readonly']) ?>
    <?= $form->field($model, 'tanggal')->textInput(['value' => date('Y-m-d')]) ?>
    <?= $form->field($model, 'pelanggan_id')->dropDownList(ArrayHelper::map(Pelanggan::find()->all(), 'pelanggan_id', 'nama_pelanggan'), ['prompt' => '--Pilih--']) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-block btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- penjualan-form_header -->