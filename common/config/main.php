<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mail' => [
            'class' => yii\swiftmailer\Mailer::className(),
            'messageConfig' => [
            'charset' => 'UTF-8',
            'from' => 'noreply@zdorov.ru'

        ],
        'transport' => [
            'class' => 'Swift_MailTransport',
        ],
        ]
    ]
];
