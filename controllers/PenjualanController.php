<?php

namespace app\controllers;

use app\models\Penjualan;
use app\models\PenjualanDetail;
use Yii;

class PenjualanController extends \yii\web\Controller
{
  public function actionIndex()
  {
    $model = new Penjualan();
    $model->total = 0;
    $model->user_id = 1;

    if ($this->request->isPost) {
      if ($model->load($this->request->post()) && $model->save()) {
        Yii::$app->session->set('nomor_nota', $model->nomor_nota);
        return $this->redirect(['input_barang']);
      }
    } else {
      $model->loadDefaultValues();
    }

    return $this->render('form_header', compact('model'));
  }

  public function actionInputBarang()
  {
    $model = new PenjualanDetail();
    $model->nomor_nota = Yii::$app->session->get('nomor_nota');
    return $this->render('form_detail', compact('model'));
  }
}
