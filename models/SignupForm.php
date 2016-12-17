<?php
namespace app\models;
use yii\base\Model;

class SignupForm extends Model {
	public $email;
	public $password;
	public $name;
	public function rules() {
		return [[['email', 'password'], 'required']];
	}
	public function signup() {
		if (!$this->validate()) {
			return null;
		}

		$user = new User();
		$user->email = $this->email;
		$user->name = $this->email;
		$user->setPassword($this->password);
		return $user->save() ? $user : null;
	}
}
?>