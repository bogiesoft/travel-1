<?php
/**
 * Created by PhpStorm.
 * User: DezMonT
 * Date: 01.04.2015
 * Time: 18:58
 */
namespace frontend\controllers;
use common\models\ForumPosts;
use common\models\ObjectCodes;
use common\models\Tours;
use common\models\Userdata;
use common\models\UserToForumUser;
use frontend\filters\SiteLayout;
use common\controllers\MainController;
use common\models\User;
use console\controllers\RbacController;
use Yii;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class UserController extends MainController
{
    public function behaviors()
    {
        return [
            'access' => [
              'class' => AccessControl::className(),
              'rules'=>[

                  [
                      'allow'=>true,
                      'roles' => ['@']
                  ]
              ]
            ],
            'layout' => SiteLayout::className()
        ];
    }
    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
        $id = \Yii::$app->user->id;

        if(!$id) {
            return $this->redirect('/site/login');
        }

        $model = $this->findModel(User::className(),$id);
        $userdata = Userdata::findOne(['user_id'=>$id]);
        $brones = ObjectCodes::find()->joinWith('tour')->where(['object_codes.user_id'=>$id])->orderBy('object_codes.created_at DESC')->groupBy('tours.id')->all();

        $forum_user = UserToForumUser::findOne(['user_id'=>$model->id]);
        $messages = ForumPosts::find()->where(['poster_id'=>$forum_user['forum_user_id']])->all();

        self::checkAccess(RbacController::update_profile,['user'=>$model]);

        if(!$userdata) {
            return $this->redirect('/site/additional');
        }

        return $this->render('user-view', [
            'model' => $model,
            'userdata' => $userdata,
            'brones'=>$brones,
            'messages'=>$messages
        ]);
    }

    /**
     * @throws HttpException
     * check users by received code, and if everything is ok, marks them as verified
     */
    public function actionVerifyEmail()
    {
        $code = Yii::$app->request->getQueryParam('code');
        if($code)
        {
            $user = User::findOne(['email_verification_code'=>$code]);
            if(!($user instanceof User))
            {
                throw new NotFoundHttpException(Yii::t('messages','Invalid code'));
            }
            $user->email_verification_status = User::EMAIL_VERIFIED;
            if(!$user->save())
            {
                throw new ServerErrorHttpException(Yii::t('messages','Something goes wrong. Please contact us, or try again later.'));
            }
            $user->sendWelcomeMail();

            return $this->goHome();

        }
        else
        {
            throw new BadRequestHttpException('Invalid code');
        }
    }

    public function actionGetVerificationMail()
    {
        /**@var User $user*/
        $user = Yii::$app->user->identity;
        if($user->renewVerificationCode())
        {
            $user->sendVerificationEmail($user->email_verification_code);
            return $this->redirect(['user/view','id'=>$user->id]);
        }
        else
            return $this->goHome();
    }


    public function actionTours(){
        $id = \Yii::$app->user->id;
        $model = $this->findModel(User::className(),$id);
        self::checkAccess(RbacController::update_profile,['user'=>$model]);
        $brones = Tours::find()->joinWith('brones')->where(['object_codes.user_id'=>$id])->orderBy('object_codes.created_at DESC')->groupBy('object_codes.object_id')->all();

        return $this->render('tours', [
            'model'=>$model,
            'tours'=>$brones,
        ]);
    }

    public function actionMessages(){
        $id = \Yii::$app->user->id;
        $model = $this->findModel(User::className(),$id);
        self::checkAccess(RbacController::update_profile,['user'=>$model]);

        $forum_user = UserToForumUser::findOne(['user_id'=>$model->id]);
        $messages = ForumPosts::find()->where(['poster_id'=>$forum_user['forum_user_id']]);
        $topics = $messages->groupBy('topic_id')->all();
        $messages = $messages->all();

        return $this->render('messages', [
            'messages'=>$messages,
            'topics'=>$topics
        ]);
    }

    public function actionForm() {

        return $this->render('form', []);
    }

}