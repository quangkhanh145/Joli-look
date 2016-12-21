<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "san_pham".
 *
 * @property string $id
 * @property string $id_loai
 * @property string $ten
 * @property string $style
 * @property string $image
 * @property double $gia
 */
class SanPham extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'san_pham';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['gia'], 'number'],
            [['id'], 'string', 'max' => 50],
            [['id_loai'], 'string', 'max' => 5],
            [['ten'], 'string', 'max' => 100],
            [['style'], 'string', 'max' => 30],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_loai' => 'Id Loai',
            'ten' => 'Ten',
            'style' => 'Style',
            'image' => 'Image',
            'gia' => 'Gia',
        ];
    }
}
