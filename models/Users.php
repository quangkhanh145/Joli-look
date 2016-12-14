<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $Id
 * @property string $email
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'Users';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['Id', 'email', 'password'], 'required'],
			[['Id'], 'string', 'max' => 5],
			[['email', 'password'], 'string', 'max' => 100],
			[['email'], 'unique'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'Id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
		];
	}
	public static function findIdentity($id) {
		return static::findOne($id);
	}
	public static function findIdentityByAccessToken($token, $type = null) {
		throw new NotSupportedException();
	}
	public static function findByEmail($email) {
		return self::findOne(['email' => $email]);
	}
	public function getId() {
		return $this->Id;
	}
	public function getAuthKey() {
		throw new NotSupportedException();
	}
	public function validateAuthKey($authKey) {
		throw new NotSupportedException();
	}
	public function validatePassword($password) {
		return $this->password === $password;
	}
}
