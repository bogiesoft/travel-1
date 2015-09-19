<?php
namespace frontend\models;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $passwordConfirm;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['username', 'string'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Это имя пользователя уже занято'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            [['password','passwordConfirm'],'required'],
            ['passwordConfirm','compare','compareAttribute'=>'password'],
            ['password', 'string'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = $this->password;
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }



    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app','Имя пользователя'),
            'email' => Yii::t('app','Email'),
            'password' => Yii::t('app','Password'),
            'passwordConfirm' => Yii::t('app','Confirm password'),
        ];
    }
}
