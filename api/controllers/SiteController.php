<?php

namespace api\controllers;

use yii\rest\Controller;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function actionIndex() {
        throw new NotFoundHttpException("Unsuported action request", 100);
    }

}
