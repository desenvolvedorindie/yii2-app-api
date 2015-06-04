<?php

namespace api\modules\v1\controllers;

use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {
        throw new NotFoundHttpException("Unsuported action request", 100);
    }

}
