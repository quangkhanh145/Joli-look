<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $name
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'user';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['email', 'password'], 'required'],
			[['id'], 'string', 'max' => 5],
			[['email', 'password', 'name'], 'string', 'max' => 100],
			[['email'], 'unique'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
			'name' => 'Name',
		];
	}
	public static function findIdentity($id) {
		return static::findOne($id);
	}

	public static function findIdentityByAccessToken($token, $type = null) {
		throw new NotSupportedException();
	}

	public function getId() {
		return $this->id;
	}

	public function getAuthKey() {
		throw new NotSupportedException();
	}

	public function validateAuthKey($authKey) {
		throw new NotSupportedException();
	}
	public static function findByEmail($email) {
		return self::findOne(['email' => $email]);
	}

	public function validatePassword($password) {
		return Yii::$app->security->validatePassword($password, $this->password);
	}
	public function setPassword($password) {
		$this->password = Yii::$app->security->generatePasswordHash($password);
	}

}
