<?php

namespace frontend\controllers;

use Yii;
use backend\models\Page;
use common\models\Option;
use common\models\Post;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;


class PageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
                    'logout' => ['post'],
                ],
            ],
        ];
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $pages = Page::find()
                    ->where(['status'=>'1'])
                    ->orderBy(['id'=>SORT_DESC])
                    ->limit(9)
                    ->all();

        $query = Post::find()
            ->from(['t' => Post::tableName()])
            ->andWhere(['status' => 'publish'])
            ->andWhere(['<=', 'date', date('Y-m-d H:i:s')])
            ->orderBy(['t.date' => SORT_DESC]);

        if (Option::get('show_on_front') == 'page' && $frontPage = Option::get('front_page')) {
            $render = '/post/view';
            $comment = new PostComment();
            $query = $query->andWhere(['id' => $frontPage]);
            if ($post = $query->one()) {
                if (is_file($this->view->theme->basePath . '/post/view-' . $post->postType->slug . '.php')) {
                    $render = '/post/view-' . $post->postType->slug;
                }

                return $this->render($render, [
                    'post' => $post,
                    'comment' => $comment,
                ]);
            }
            throw new NotFoundHttpException(Yii::t('writesdown', 'The requested page does not exist.'));
        } else {
            if (Option::get('front_post_type') !== 'all') {
                $query->innerJoinWith(['postType'])->andWhere(['name' => Option::get('front_post_type')]);
            }
            $countQuery = clone $query;
            $pages = new Pagination([
                'totalCount' => $countQuery->count(),
                'pageSize' => Option::get('posts_per_page'),
            ]);
            $query->offset($pages->offset)->limit($pages->limit);
            if ($posts = $query->all()) {
                return $this->render('index', [
                    'pages' => $pages,
                ]);
            }

            throw new NotFoundHttpException(Yii::t('writesdown', 'The requested page does not exist.'));
        }
    }

    public function actionView($slug) {

        $page = Page::find()
                    ->where(['slug'=>$slug])
                    ->andWhere(['status'=>'1'])
                    ->all();

        if($page == null) {
            return $this->render('../page/error');
        }

        return $this->render('../page/view', [
            'page' => $page,
        ]);

    }
    

    /**
     * Search post by title and content
     *
     * @param string $s Keyword to search posts.
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionSearch($s)
    {
        $query = Post::find()
            ->orWhere(['like', 'title', $s])
            ->orWhere(['like', 'content', $s])
            ->andWhere(['status' => 'publish'])
            ->andWhere(['<=', 'date', date('Y-m-d H:i:s')])
            ->orderBy(['date' => SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => Option::get('posts_per_page'),
        ]);
        $query->offset($pages->offset)->limit($pages->limit);
        $posts = $query->all();

        if ($posts) {
            return $this->render('/site/search', [
                'posts' => $posts,
                'pages' => $pages,
                's' => $s,
            ]);
        }

        throw new NotFoundHttpException(Yii::t('writesdown', 'The requested page does not exist.'));
    }

    /**
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionForbidden()
    {
        throw new ForbiddenHttpException(Yii::t('writesdown', 'You are not allowed to perform this action.'));
    }

    /**
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionNotFound()
    {
        throw new NotFoundHttpException(Yii::t('writesdown', 'The requested page does not exist.'));
    }

}
