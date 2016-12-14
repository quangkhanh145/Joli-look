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
class Users extends \yii\db\ActiveRecord implements IdentityInterface {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'users';
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
		return static::findOne($Id);
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null) {
		throw new NotSupportedException();
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return static|null
	 */
	public static function findByEmail($email) {
		return self::findOne(['email' => $email]);
	}

	/**
	 * @inheritdoc
	 */
	public function getId() {
		return $this->Id;
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey() {
		throw new NotSupportedException();
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey) {
		throw new NotSupportedException();
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password) {
		return $this->password === $password;
	}
}
