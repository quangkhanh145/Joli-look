<?php
namespace app\controllers;
use app\models\cart;
use Yii;
use yii\web\Controller;

class CartController extends Controller {
	public function actionAddcart() {

		$request = Yii::$app->request;
		if ($request->isAjax) {
			$lens = $request->post("lens");
			$id = $request->post("id");
			$cart = new Cart();
			if ($cart->add($id, $lens)) {
				$data = ['success' => true, 'count' => $cart->count()];

			} else {
				$data = ['success' => false];
			}
		}
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		return $data;
	}
	public function actionRemovefromcart() {
		$request = Yii::$app->request;
		if ($request->isAjax) {
			$id = $request->get("id");
			$lens = $request->get("lens");
			$cart = new Cart();
			if ($cart->remove($id, $lens)) {
				$data = ['success' => true, 'count' => $cart->count()];
				var_dump(Yii::$app->session['cart']);
			} else {
				$data = ['success' => false];
			}
		}
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		return $data;
	}
	public function actionOrder() {

	}
}
?>