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

        $text = '';

        switch ($post['message']['text']) {

            case 'hai':
                $text = 'hai juga kak';
                break;

            case 'apa kabar?':
                $text = 'kabar baik. kalo kakak gimana kabarnya nih?';
                break;

            case 'bye':
                $text = 'bye juga kak. sampai jumpa lagi';
                break;

            default:
                $text = 'hmm saya gk ngerti, bisa diulang?';
        }

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://api.telegram.org/bot557170275:AAGwiZs-bNX_tiOHzqH_4wonYL5hwaoQtSg/sendMessage')
            ->setData([
                'chat_id' => '899157364',
                'text' => $text
            ])
            ->send();

        return $response->data;
    }
}