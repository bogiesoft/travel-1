<?php
namespace frontend\controllers;

use common\components\Alert;
use common\controllers\MainController;
use common\models\Events;
use common\models\Tours;
use common\models\Userdata;
use console\controllers\RbacController;
use frontend\filters\SiteLayout;
use Yii;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\RegisterForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\AccessControl;
use yii\web\Response;
use common\models\Slider;
use common\models\Advices;
use common\models\Adv;
use common\models\News;

/**
 * Site controller
 */
class SiteController extends MainController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
       $behaviors =  [
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['test'],
                'rules' => [
                    [
                        'actions' => ['register','additional','login','index','webcams','contact'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
        $behaviors['layout'] =  ['class' => SiteLayout::className()];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $slides = Slider::find()->all();

        $advices = Advices::find()->where(["show"=>1])->orderBy('created_at DESC')->all();
        $adv = Adv::find()->where(["show"=>1])->limit(3)->all();
        $news = News::find()->where(["status"=>1])->limit(3)->orderBy('created_at DESC')->all();
        $events = Events::find()->where(["status"=>1])->limit(3)->orderBy('created_at DESC')->all();
        $tours = Tours::find()->where(['status'=>1])->limit(6)->orderBy('created_at DESC')->all();

        return $this->render('index',[
            'slides'=>$slides,
            'advices'=>$advices,
            'adv' => $adv,
            'news'=>$news,
            'events'=>$events,
            'tours'=>$tours,
        ]);
    }


    /**
     * @return array|Response
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login',[
                      'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionAdditionalRegister($id) {
        $model = new Userdata();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
            if($model->image) {
                if($model->getImage()) {
                    $model->removeImages();
                }
                $path = Yii::getAlias('@webroot/images/store/').$model->image->baseName.'.'.$model->image->extension;
                $model->image->saveAs($path);
                $model->attachImage($path, true);
            }

            return $this->goHome();
        }

        return $this->render('additional', [
            'id' => $id,
            'model' => $model
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if(Yii::$app->user->isGuest)
        {
            $model->load(Yii::$app->request->post());
        }
        else
        {
            $model->email = Yii::$app->user->identity->email;
        }
        if($model->validate())
        {
            if($model->sendEmail())
            {
                Alert::addSuccess(Yii::t('messages','Check your email for further instructions.'));
                return $this->goHome();
            }
            else
            {
                Alert::addError(Yii::t('messages','Sorry, we are unable to reset password for email provided.'));
                return $this->goHome();
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try
        {
            $model = new ResetPasswordForm($token);
        }
        catch (InvalidParamException $e)
        {
            throw new BadRequestHttpException(Yii::t('messages','Wrong password reset token.'));
        }
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate() && $model->resetPassword())
            {
                Alert::addSuccess(Yii::t('messages', 'New password was saved.'));
                return $this->goHome();
            }
            else
            {
                Alert::addError(Yii::t('messages','Password hasn\'t been saved.'));
                return $this->goHome();
            }
        }
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public static function getOption($name) {
        $option = \common\models\Options::findOne(['name'=>$name]);
        return $option->value;
    }
}
