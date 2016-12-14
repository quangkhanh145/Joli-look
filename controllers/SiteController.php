<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\UsersForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
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
					'logout' => ['get'],
				],
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function actions() {
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

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex() {
		return Yii::$app->response->redirect(Url::to(['site/women']));
	}

	/**
	 * Login action.
	 *
	 * @return string
	 */
	public function actionLogin() {
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}
		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
	 * Logout action.
	 *
	 * @return string
	 */
	public function actionLogout() {
		Yii::$app->user->logout();

		return $this->goHome();
	}

	/**
	 * Displays contact page.
	 *
	 * @return string
	 */
	public function actionContact() {
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		}
		return $this->render('contact', [
			'model' => $model,
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout() {
		return $this->render('about');
	}
	public function actionWomen() {
		return $this->render('women');
	}
	public function actionMen() {
		return $this->render('men');
	}
	public function actionUser() {
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new UsersForm();
		$model['email'] = Yii::$app->request->post()['email'];
		$model['password'] = Yii::$app->request->post()['password'];
		if ($model->login()) {
			return $this->goBack();
		}
		return $this->render('user', [
			'model' => $model,
		]);
	}
	public function actionUsermobile() {
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new UsersForm();
		$model['email'] = Yii::$app->request->post()['email'];
		$model['password'] = Yii::$app->request->post()['password'];
		if ($model->login()) {
			return $this->goBack();
		}
		return $this->render('usermobile', [
			'model' => $model,
		]);
	}
	public function actionEyeglassesWomen() {
		return $this->render('eyeglasses-women');
	}
}
