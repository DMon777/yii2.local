<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property string $id
 * @property string $header
 * @property string $text
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header', 'text'], 'required'],
            [['text'], 'string'],
            [['header'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Header',
            'text' => 'Text',
        ];
    }
}
