<?php
namespace backend\controllers;

use AES;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        include_once('crypt/AES.class.php');

        $key256 = '603deb1015ca71be2b73aef0857d77811f352c073b6108d72d9810a30914dff4';
// =====================================================================================================
        $Cipher = new AES(AES::AES256);

        $content = "Alice has a cat";
//        print $content.'<br />';

        $start = microtime(true);
        $content = $Cipher->stringToHex($content);
        $content = $Cipher->encrypt($content, $key256);
        $end = microtime(true);
//        print('AES Class encryption time (256bit): '.(($end - $start)*1000).'ms <br />');
//        print $content.'<br />';
        $decrypted = $content;
        $start = microtime(true);
        $content = $Cipher->decrypt($content, $key256);
        $content = $Cipher->hexToString($content);
        $end = microtime(true);
//        print('AES Class decryption time (256bit): '.(($end - $start)*1000).'ms <br />');
//        print $content.'<br />';
        $encrypted = $content;
        return $this->render('index' ,
            [
                'decrypted' => $decrypted,
                'encrypted' => $encrypted,
            ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
