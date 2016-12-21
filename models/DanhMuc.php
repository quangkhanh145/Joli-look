<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "danh_muc".
 *
 * @property string $id
 * @property string $tensp
 * @property string $loai
 * @property string $gioi_tinh
 * @property double $gia_thamkhao
 */
class DanhMuc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'danh_muc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['gia_thamkhao'], 'number'],
            [['id'], 'string', 'max' => 5],
            [['tensp', 'loai'], 'string', 'max' => 100],
            [['gioi_tinh'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tensp' => 'Tensp',
            'loai' => 'Loai',
            'gioi_tinh' => 'Gioi Tinh',
            'gia_thamkhao' => 'Gia Thamkhao',
        ];
    }
}
