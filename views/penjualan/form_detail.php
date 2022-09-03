<?php

use app\models\Barang;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\PenjualanDetail */
/* @var $form ActiveForm */
?>
<div class="penjualan-form_detail">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_nota') ?>
    <?= $form->field($model, 'barang_id')->label('Pilih Barang')->dropDownList(ArrayHelper::map(Barang::find()->all(), 'barang_id', 'nama_barang'), ['prompt' => '--Pilih--']) ?>
    <?php Pjax::begin(['id' => 'pjax-harga']) ?>
    <?php
    $harga = '';
    $barang_id = isset($_COOKIE['barang_id']) ? $_COOKIE['barang_id'] : '';
    $x = Barang::findOne($barang_id);
    $harga = $x->harga_satuan;
    ?>
    <?= $form->field($model, 'harga')->textInput(['value' => $harga]) ?>
    <?php Pjax::end() ?>
    <?= $form->field($model, 'jumlah') ?>
    <?= $form->field($model, 'subtotal') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- penjualan-form_detail -->
<?php
$js = <<<JS
$("#penjualandetail-barang_id").change(function(){
    document.cookie = "barang_id="+this.value+"SameSite=Lax"
    $.pjax.reload({container: "#pjax-harga", async:true})
});

JS;
$this->registerJS($js);

?>