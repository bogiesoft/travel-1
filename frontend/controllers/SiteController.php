<?php
namespace frontend\controllers;

use common\components\Alert;
use common\components\RoslPhpBbClass;
use common\controllers\MainController;
use common\models\Events;
use common\models\Rating;
use common\models\Tours;
use common\models\Userdata;
use common\models\UserToForumUser;
use console\controllers\RbacController;
use frontend\filters\SiteLayout;
use frontend\models\User;
use Yii;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\RegisterForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\base\Model;
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
                        'actions' => ['register','login','index','webcams','contact', 'form'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','index','rating','additional', 'form', 'addtourform'],
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

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $slides = Slider::find()->orderBy('order ASC')->all();

        $advices = Advices::find()->where(["show"=>1])->orderBy('order ASC')->all();
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
        $show_m = \Yii::$app->getRequest()->getQueryParam('show_message');
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $post = Yii::$app->request->post();
            $user = User::findByEmail($post['LoginForm']['email']);
            $forum = new RoslPhpBbClass;
            $forum->login([
                'username'=>$user->username,
                'password'=>$post['LoginForm']['password']
            ]);

            return $this->goBack();
        }
        return $this->render('login',[
            'model' => $model,
            'show_message'=>$show_m
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
        $userdata_model = new Userdata();

        if ($model->load(Yii::$app->request->post()) && $userdata_model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            //var_dump($post['RegisterForm']);die;

            if($user = $model->register()) {
                $userdata_model->user_id = $user->getId();
                $userdata_model->save();
                $forum = new RoslPhpBbClass;
                $forum_user_id = $forum->registration($post['RegisterForm']);
                $user_id = $user->getId();
                $user_to_forum_user = new UserToForumUser;
                $user_to_forum_user->user_id = $user_id;
                $user_to_forum_user->forum_user_id = $forum_user_id;
                $user_to_forum_user->save();

                $forum->login($post['RegisterForm']);

                if (Yii::$app->getUser()->login($user)) {
                    return $this->redirect('/site/additional');
                    //return $this->goHome();
                }
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionAdditional() {
        $model = Userdata::findOne(['user_id'=>(int)Yii::$app->user->id]);
        //$model->user_id = (int)Yii::$app->user->id;
        $main_model = User::findOne((int)Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post()) && $model->save() && $main_model->load(Yii::$app->request->post()) && $main_model->save()) {

            $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
            //var_dump($model->image);die;
            if($model->image) {
                if($model->getImage()) {
                    $model->removeImages();
                }
                $path = Yii::getAlias('@webroot/images/store/').$model->image->baseName.'.'.$model->image->extension;
                $model->image->saveAs($path);
                $model->attachImage($path, true, 'namename');
            }

            return $this->goHome();
        }

        return $this->render('additional', [
            'id' => Yii::$app->user->id,
            'model' => $model,
            'main_model' => $main_model,
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

    public function actionForm(){
        $post = Yii::$app->request->post();
        $my_email = $this->getOption('contact_email');

        $content = "
        Пользователь задал вопрос на сайте.\n
        \n
        Имя: {$post['name']}\n
        Email: {$post['mail']}\n
        Вопрос: {$post['message']}
        ";

        return json_encode(mail($my_email, 'Пользователь ТУРФИРМ НЕТ задал вопрос', $content));
    }

    public static function getOption($name) {
        $option = \common\models\Options::findOne(['name'=>$name]);
        return $option->value;
    }

    public function actionRating() {
        $post = \Yii::$app->request->post();

        $model = Rating::findOne(['user_id'=>$post['user_id'], 'event_id'=>$post['event_id']]);
        if ($model == null) {
            $model = new Rating;
            $model->user_id = $post['user_id'];
            $model->event_id = $post['event_id'];
            $model->rating = $post['rating'];
        }
        else {
            $model->rating = $post['rating'];
        }
        if ($model->save()) {
            return 'success';
        }
        return 'error';
    }

    public function actionAddtourform() {
        $id = \Yii::$app->user->identity;
        if(!empty($id)) {
            $post = \Yii::$app->request->post();
            $content = "На сайте ТУРФИРМ.НЕТ пользователь предложил тур. \n\n
            Имя: {$post['firstname']}\n
            Фамилия: {$post['surname']}\n
            Email: {$post['email']}\n
            Телефон: {$post['phone']}\n
            Название тура: {$post['nametour']}\n
            Описание: {$post['texttour']}\n";
            $mail = $this->getOption('contact_email');
            $subject = 'На сайте ТУРФИРМ.НЕТ пользователь предложил тур';

            return mail($mail, $subject, $content);
        }
    }
}
