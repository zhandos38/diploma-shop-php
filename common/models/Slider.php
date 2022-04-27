<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string|null $img
 * @property string|null $title
 * @property string|null $subtitle
 * @property int|null $created_at
 * @property string $link [varchar(500)]
 */
class Slider extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'integer'],
            [['img', 'title', 'subtitle'], 'string', 'max' => 255],
            ['link', 'string'],

            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Рисунок',
            'imageFile' => 'Рисунок',
            'title' => 'Текст',
            'subtitle' => 'Под текст',
            'link' => 'Ссылка',
            'created_at' => 'Время добавление',
        ];
    }

    public function upload()
    {   $imgPath = \Yii::getAlias('@static');

        if ($this->imageFile === null) {
            return true;
        }

        if ($this->validate()) {
            $this->imageFile->saveAs($imgPath . '/slider/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        }

        return false;
    }

    public function beforeSave($insert)
    {
        if ($this->imageFile) {
            $this->img = $this->imageFile->baseName . '.' . $this->imageFile->extension;
        }
        return true;
    }

    public function getImage()
    {
        return Yii::$app->params['staticDomain'] . '/slider/' . $this->img;
    }
}
