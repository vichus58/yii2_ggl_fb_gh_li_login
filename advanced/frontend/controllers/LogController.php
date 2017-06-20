<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Html;

/**
 * Site controller
 */
class LogController extends Controller
  {
      public function actions()
      {
          return [
              'auth' => [
                  'class' => 'yii\authclient\AuthAction',
                  'successCallback' => [$this, 'successCallback'],
              ],
          ];
      }
      public function auth()
      {
          return [
              'auth' => [
                  'class' => 'yii\authclient\AuthAction',
                  'successCallback' => [$this, 'successCallback'],
              ],
          ];
      }
 
      public function successCallback($client)
      {
          $attributes = $client->getUserAttributes();
          print_r($attributes);
          die;
          // user login or signup comes here
      }



    //   public function oAuthSuccess($client) 
    // {
    //   // var_dump($client);
    //     if (!$this->action instanceof \yii\authclient\AuthAction) {
    //   throw new \yii\base\InvalidCallException("successCallback is only meant to be executed by AuthAction!");
    // }   
    //     //var_dump($client);
    //     $attributes = $client->getUserAttributes();
    //     var_dump($attributes);
    //     echo Html::img('http://graph.facebook.com/'.$attributes['id'].'/picture?type=large');
    //     die;
    //      // $userAttributes = $client->getUserAttributes();
    //         // user login or signup comes here
    //         /*
    //         Checking facebook email registered yet?
    //         Maxsure your registered email when login same with facebook email
    //         die(print_r($attributes));
    //         */
            
    //         //  $user = \common\modules\auth\models\User::find()->where([’email’=>$attributes[’email’]])->one();
    //         //  if(!empty($user)){
    //         //      Yii::$app->user->login($user);
            
    //         //  }else{
    //         //     // Save session attribute user from FB
    //         //     $session = Yii::$app->session;
    //         //     $session[‘attributes’]=$attributes;
    //         //     // redirect to form signup, variabel global set to successUrl
    //         //     $this->successUrl = \yii\helpers\Url::to([‘signup’]);
    //         // }
    // }
    // // public $successUrl = 'Success'; 




    // public function actionReadirectvichu()
    // {
    //     $session = Yii::$app->session;
    //     if ($session->isActive) 
    //     {
    //     $session->open();
    //     }


    //   echo $session->get('code');
    //   // $client = new Google_Client();

    //   // $client->authenticate($session->get('code'));
    //   // var_dump($client);
    //   // return $this->redirect(['index']);
    //   die;
    // }






  }