<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "recall".
 *
 * @property int $id
 * @property string|null $phone
 * @property int|null $status
 * @property int|null $created_at
 */
class Recall extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_PROCESSED = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recall';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at'], 'integer'],
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Номер телефона',
            'status' => 'Статус',
            'created_at' => 'Время добавление',
        ];
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_PROCESSED => 'Обработкано'
        ];
    }

    public function getStatusLabel()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }
}
