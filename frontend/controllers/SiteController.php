<?php
namespace frontend\controllers;

use common\models\Product;
use common\models\Slider;
use common\models\User;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\authclient\clients\VKontakte;
use yii\base\InvalidArgumentException;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use sergmoro1\user\traits\AuthTrait;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ]
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'home';

        $newProducts = Product::find()->andWhere(['type' => Product::TYPE_NEW])->limit(8)->all();
        $hotProducts = Product::find()->andWhere(['type' => Product::TYPE_HOT])->limit(8)->all();
        $saleProducts = Product::find()->andWhere(['type' => Product::TYPE_SALE])->limit(8)->all();

        $products = Product::find()->limit(8)->all();

        $sliders = Slider::find()->all();

        return $this->render('index', [
            'newProducts' => $newProducts,
            'hotProducts' => $hotProducts,
            'saleProducts' => $saleProducts,
            'sliders' => $sliders,
            'products' => $products
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/index']);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    public function actionPayment()
    {
        return $this->render('payment');
    }

    public function actionReturn()
    {
        return $this->render('return');
    }

    public function actionCard()
    {
        return $this->render('card');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Спасибо, Вы успешно зарегистрировались');
            return $this->redirect(['site/login']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionOffer()
    {
        return $this->render('offer');
    }

    public function onAuthSuccess($client)
    {
        $serviceName = $client->getTitle();

        /** @var array $attributes */
        $attributes = $client->getUserAttributes();

        $user = null;
        if ($serviceName === 'VKontakte') {
            $id = ArrayHelper::getValue($attributes, 'user_id');
            $firstName = ArrayHelper::getValue($attributes, 'first_name');
            $lastName = ArrayHelper::getValue($attributes, 'last_name');

            $user = User::findBySocialNetworkId($id);
            if (!$user) {
                $user = new User();
                $user->name = $firstName . ' ' . $lastName;
                $user->status = User::STATUS_ACTIVE;
                $user->social_network_id = (string)$id;
                $user->setPassword($id);
                $user->generateAuthKey();
                $user->generateEmailVerificationToken();
                if (!$user->save()) {
                    throw new Exception(Json::encode($user->errors));
                }
            }

        } elseif ($serviceName === 'Facebook' || $serviceName === 'Google') {
            $email = ArrayHelper::getValue($attributes, 'email'); //email info
            $id = ArrayHelper::getValue($attributes, 'id'); // id facebook user
            $name = ArrayHelper::getValue($attributes, 'name'); // name facebook account

            //Login user
            //For demo, I will login with admin/admin default account
            $user = User::findBySocialNetworkId($id);
            if (!$user) {
                $user = new User();
                $user->name = $name;
                $user->email = $email;
                $user->social_network_id = $id;
                $user->status = User::STATUS_ACTIVE;
                $user->setPassword($id);
                $user->generateAuthKey();
                $user->generateEmailVerificationToken();
                $user->save();
            }
        }

        Yii::$app->user->login($user);
    }
}
