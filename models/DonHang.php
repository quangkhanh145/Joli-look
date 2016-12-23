<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "don_hang".
 *
 * @property string $ma_don_hang
 * @property string $tenKH
 * @property string $dia_chi
 * @property string $phone
 * @property string $email
 * @property double $tong_tien
 * @property integer $status
 */
class DonHang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'don_hang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ma_don_hang'], 'required'],
            [['tong_tien'], 'number'],
            [['status'], 'integer'],
            [['ma_don_hang'], 'string', 'max' => 50],
            [['tenKH', 'dia_chi'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ma_don_hang' => 'Ma Don Hang',
            'tenKH' => 'Ten Kh',
            'dia_chi' => 'Dia Chi',
            'phone' => 'Phone',
            'email' => 'Email',
            'tong_tien' => 'Tong Tien',
            'status' => 'Status',
        ];
    }
}
