<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
$config = parse_ini_file(__DIR__ . '/../../../../app-config.ini', true);


return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
         'authClientCollection' => [
              'class' => 'yii\authclient\Collection',
              'clients' => [
                'facebook' => [
                  'class' => 'yii\authclient\clients\Facebook',
                  'authUrl' => 'https://www.facebook.com/dialog/oauth',//?display=popup',
                  'clientId' => $config['facebook_app_id'],
                  'clientSecret' => $config['facebook_app_secret'],
                  'attributeNames' => ['id','name', 'email', 'first_name','middle_name', 'last_name','gender'],//,'picture','age_range'],
                ],

                'linkedin' => [
                'class' => 'yii\authclient\clients\LinkedIn',
                'clientId' => $config['LinkedIn_client_id'],
                'clientSecret' => $config['LinkedIn_client_secret'],
                ],

                'google' => [
                'class' => 'yii\authclient\clients\Google',
                 'clientId' => $config['google_client_id'],
                 'clientSecret' => $config['google_client_secret'],
                 // 'scope'=>' https://www.googleapis.com/auth/plus.profile.emails.read',
                 'returnUrl' => "http://vichu.th/gfbinvin/advanced/frontend/web/index.php/log/auth?authclient=google"
                ],

                'github' => [
                'class' => 'yii\authclient\clients\GitHub',
                'clientId' => $config['github_client_id'],
                'clientSecret' => $config['github_client_secret'],
                ],

              ],
            ],
 
        
        'urlManager' => [
        'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            // 'showScriptName' => false,
            'rules' => [
             '<controller:\w+>/<id:\d+>' => '<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
          '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
          'defaultRoute' => '/site/index',
            ],
        ],
        
    ],
    'params' => $params,
];
