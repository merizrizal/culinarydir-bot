<?php
namespace bot\controllers;


class BotHookController extends \yii\rest\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(
            [],
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'index' => ['GET']
                    ],
                ],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $this->layout = 'zero';

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => 'error',
            ],
        ];
    }

    public function actionIndex() {



        return true;
    }
}