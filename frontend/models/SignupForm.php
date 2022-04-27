<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $region_id;
    public $city_id;
    public $address;
    public $post_code;
    public $password;
    public $password_repeat;
    public $role;
    public $status;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'phone', 'address'], 'string', 'max' => 255],
            ['post_code', 'string', 'max' => 20],

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Данный почтовый адрес уже используется.'],

            ['password','required', 'message' => Yii::t('app', 'Придумайте пароль')],
            ['password_repeat' ,'required', 'message' => '{attribute}'],
            ['password', 'string', 'min' => 6, 'message' => Yii::t('app', 'Пароль должен содержать минимум 6 символов')],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'Пароли не совпадают')],
            ['password', 'match', 'pattern' => '/^[a-zA-Z0-9_-]+$/', 'message' => Yii::t('app', 'Пароль должен содержать только латинские буквы, спецсимволы и/или цифры')],

            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Данный номер телефона уже используется.'],

            [['status', 'city_id', 'region_id'], 'integer'],
            ['role', 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Имя'),
            'email' => Yii::t('app', 'Почта'),
            'phone' => Yii::t('app', 'Номер телефона'),
            'region_id' => Yii::t('app', 'Область/Регион'),
            'city_id' => Yii::t('app', 'Город'),
            'address' => Yii::t('app', 'Адрес'),
            'password' => Yii::t('app', 'Пароль'),
            'password_repeat' => Yii::t('app', 'Повторите пароль'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->city_id = $this->city_id;
        $user->address = $this->address;
        $user->post_code = $this->post_code;
        $user->role = User::ROLE_USER;
        $user->status = User::STATUS_ACTIVE;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save();
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
