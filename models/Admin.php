<?php

namespace app\models;

class Admin extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {
	public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'password', 'authKey'], 'safe'],
        ];
    }

    public static function tableName() {
		return '{{admins}}';
	}

	public static function findIdentityByAccessToken($token, $type = null){
		throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
	}

	public static function findIdentity($id) {
		return static::findOne($id);
	}

	public function getId() {
		return $this->id;
	}

	public function getAuthKey() {
		return $this->authKey;//Here I return a value of my authKey column
	}

	public function validateAuthKey($authKey) {
		return $this->authKey === $authKey;
	}
	public static function findByUsername($username) {
		return self::findOne(['username'=>$username]);
	}

	public function validatePassword($password) {
		return $this->password === $password;
	}
}