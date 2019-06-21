<?php
namespace bot\controllers;

use yii\filters\VerbFilter;
use yii\httpclient\Client;

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
                        'index' => ['POST']
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

        $post = \Yii::$app->request->post();

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://api.telegram.org/bot557170275:AAGwiZs-bNX_tiOHzqH_4wonYL5hwaoQtSg/sendMessage')
            ->setData([
                'chat_id' => '899157364',
                'text' => $post['message']['text']
            ])
            ->send();

        return $response->data;
    }
}