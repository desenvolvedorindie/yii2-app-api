<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller {

    public function actionIndex() {
        throw new NotFoundHttpException("Unsuported action request", 100);
    }

}
