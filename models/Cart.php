<?php
namespace app\models;
use Yii;

class Cart {
	public function add($id, $lens) {
		$sanpham = SanPham::findOne($id);
		if ($sanpham) {
			$danhmuc = DanhMuc::findOne($sanpham->id_danhmuc);
		}
		if ($lens === "RX") {
			$gia = $danhmuc->gia_don_trong;
		} else if ($lens === "PROG") {
			$gia = $danhmuc->gia_da_trong;
		}
		$session = Yii::$app->session;
		if (isset($session['cart'])) {
			$cart = $session['cart'];
			$GLOBALS['stt'] = 1;
			/*foreach ($cart as $item) {
					if ($id === ($item['id']) && $lens === ($item['loai_trong'])) {
							$cart[$GLOBALS['stt']] = [
								'id' => $id,
								'ten' => $danhmuc->tensp,
								'mau' => $sanpham->mau_sac,
								'loai_trong' => $lens,
								'so_luong' => $item['so_luong'] + 1,
								'gia' => $gia,
								'image' => $sanpham->image];
							$session['cart'] = $cart;
							return true;
						} else {
							$GLOBALS['stt']++;
				}
			*/

			while (isset($cart[$GLOBALS['stt']])) {
				$GLOBALS['stt']++;
			}
			$cart[$GLOBALS['stt']] = [
				'id' => $id,
				'ten' => $danhmuc->tensp,
				'mau' => $sanpham->mau_sac,
				'loai_trong' => $lens,
				'so_luong' => 1,
				'gia' => $gia,
				'image' => $sanpham->image,
			];

			$session['cart'] = $cart;
			return true;
		} else {
			$GLOBALS['stt'] = 1;
			$cart[$GLOBALS['stt']] = [
				'id' => $id,
				'ten' => $danhmuc->tensp,
				'mau' => $sanpham->mau_sac,
				'loai_trong' => $lens,
				'so_luong' => 1,
				'gia' => $gia,
				'image' => $sanpham->image];
			$session['cart'] = $cart;
			return true;
		}
		return false;
	}
	public function remove($id, $lens) {
		$session = Yii::$app->session;
		if (isset($session['cart'])) {
			$cart = $session['cart'];
			$GLOBALS['stt'] = 1;
			foreach ($cart as $item) {
				if ($id === ($item['id']) && $lens === ($item['loai_trong'])) {
					unset($cart[$GLOBALS['stt']]);
					$session['cart'] = $cart;
					return true;
				} else {
					$GLOBALS['stt']++;
				}
			}
		}
		return false;
	}
	public function count() {
		$count = 0;
		$session = Yii::$app->session;
		$cart = $session['cart'];
		if ($cart) {
			foreach ($cart as $item) {
				$count += $item['so_luong'];
			}
		}
		/*Yii::$app->session->remove('cart');*/
		return $count;
	}
	public function getCart() {
		$session = Yii::$app->session;
		$cart = $session['cart'];
		return $cart;
	}
}
?>