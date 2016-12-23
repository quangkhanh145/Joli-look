<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\DanhMuc;
use app\models\LoginForm;
use app\models\SanPham;
use app\models\SignupForm;
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

		$model = new LoginForm();
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

		$model = new LoginForm();
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
		$query = SanPham::find();
		$query_2 = DanhMuc::find();
		$ds_sanpham = $query->orderBy('id')
			->all();
		$danhmuc = $query_2->orderBy(['id' => SORT_DESC])
			->limit(30)->all();
		return $this->render('eyeglasses-women', [
			'ds_sanpham' => $ds_sanpham,
			'danhmuc' => $danhmuc]);
	}
	public function actionCreate() {
		$model = new SignupForm();
		$model['email'] = Yii::$app->request->post()['email'];
		$model['password'] = Yii::$app->request->post()['password'];
		if ($model->signup()) {
			$login = new LoginForm();
			$login->email = $model->email;
			$login->password = $model->password;
			if ($login->login()) {
				return $this->render('myaccount');
			}
		}
		return $this->render('create');
	}
	public function actionMyaccount() {
		if (Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		return $this->render('myaccount');
	}
	public function actionProductDetails() {
		$id = Yii::$app->request->get()['id'];
		$sanpham = SanPham::findOne($id);
		if ($sanpham) {
			$danhmuc = DanhMuc::findOne($sanpham->id_danhmuc);
			return $this->render('product-details', [
				'sanpham' => $sanpham,
				'danhmuc' => $danhmuc]);
		}
		$this->goHome();
	}
}
