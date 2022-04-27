<?php

namespace common\models\base;

use common\models\ProductImage;
use common\models\ProductOption;
use common\models\ProductPrice;
use common\models\WishList;
use Stem\LinguaStemRu;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
use yii\data\Pagination;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\imagine\Image;

/**
 * This is the base model class for table "product".
 *
 * @property integer $id
 * @property string $name_ru
 * @property string $name_kz
 * @property string $name_en
 * @property string $name_ch
 * @property string $code
 * @property string $price
 * @property string $price_old
 * @property integer $quantity
 * @property integer $category_id
 * @property string $img
 * @property string $description_ru
 * @property string $description_kz
 * @property string $description_en
 * @property string $description_ch
 * @property string $short_description_ru
 * @property string $short_description_kz
 * @property string $short_description_en
 * @property string $short_description_ch
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $type
 * @property string $video_url
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property float $priceMin
 * @property float $priceMax
 *
 * @property string $name
 * @property string $shortDescription
 * @property string $description
 * @property \common\models\OrderItem[] $orderItems
 * @property \common\models\Category $category
 * @property \common\models\ProductAttributeValue[] $productAttributeValues
 * @property \common\models\ProductImage[] $productImages
 * @property \common\models\ProductOption[] $productOptions
 * @property \common\models\ProductPrice[] $productPrices
 */
class Product extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    const TYPE_NEW = 0;
    const TYPE_HOT = 1;
    const TYPE_SALE = 2;

    const DELIVERY_RATE = 0.03;

    public $imageFiles;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_kz', 'name_en', 'name_ch', 'price'], 'required'],
            [['name_ru', 'name_kz', 'name_en', 'name_ch'], 'string', 'max' => 255],
            [['short_description_ru', 'short_description_kz', 'short_description_en', 'short_description_ch'], 'string'],
            [['description_ru', 'description_kz', 'description_en', 'description_ch'], 'string'],

            [['price', 'price_old', 'quantity'], 'number'],

            [['code'], 'required'],
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            [['meta_keywords', 'meta_description'], 'string'],
            [['code', 'img'], 'string', 'max' => 255],
            [['type'], 'integer'],

            ['video_url', 'string', 'max' => 100],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'name_ru' => 'Наименование (RU)',
            'name_kz' => 'Наименование (KZ)',
            'name_en' => 'Наименование (EN)',
            'name_ch' => 'Наименование (CH)',
            'code' => 'Штрихкод',
            'price' => 'Цена',
            'price_old' => 'Цена без скидки',
            'quantity' => 'Остаток',
            'category_id' => 'Категория',
            'img' => 'Картина',
            'imageFiles' => 'Картинки',
            'description' => 'Описание',
            'description_ru' => 'Описание (RU)',
            'description_kz' => 'Описание (KZ)',
            'description_en' => 'Описание (EN)',
            'description_ch' => 'Описание (CH)',
            'short_description' => 'Краткое описание',
            'short_description_ru' => 'Краткое описание (RU)',
            'short_description_kz' => 'Краткое описание (KZ)',
            'short_description_en' => 'Краткое описание (EN)',
            'short_description_ch' => 'Краткое описание (CH)',
            'type' => 'Тип',
            'video_url' => 'Видео',
            'created_at' => 'Время создание',
            'updated_at' => 'Время обновление',
        ];
    }

    public function getName() {
        switch (Yii::$app->language) {
            case 'ru':
                return $this->name_ru;
                break;
            case 'kz':
                return $this->name_kz;
                break;
            case 'en':
                return $this->name_en;
                break;
            case 'ch':
                return $this->name_ch;
                break;
        }

        return false;
    }

    public function getShortDescription() {
        switch (Yii::$app->language) {
            case 'ru':
                return $this->short_description_ru;
                break;
            case 'kz':
                return $this->short_description_kz;
                break;
            case 'en':
                return $this->short_description_en;
                break;
            case 'ch':
                return $this->short_description_ch;
                break;
        }

        return false;
    }

    public function getDescription() {
        switch (Yii::$app->language) {
            case 'ru':
                return $this->description_ru;
                break;
            case 'kz':
                return $this->description_kz;
                break;
            case 'en':
                return $this->description_en;
                break;
            case 'ch':
                return $this->description_ch;
                break;
        }

        return false;
    }

    public static function getTypes() {
        return [
            self::TYPE_NEW => 'Новые товары',
            self::TYPE_HOT => 'Горячие товары',
            self::TYPE_SALE => 'Распродажа'
        ];
    }

    public function getType() {
        return ArrayHelper::getValue(self::getTypes(), $this->type);
    }

    public function getMainImg()
    {
        return $this->images ? $this->images[0]->getImgPath() : '/images/no-image.jpg';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    public function upload()
    {
        if ($this->imageFiles === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/product';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $imgPath = $folderPath . '/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($imgPath);
            }

            Image::resize($imgPath,500, 500, true)->save();

            return true;
        }

        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function IsFavourite()
    {
        return $this->hasOne(WishList::className(), ['product_id' => 'id'])
            ->where(['user_id' => Yii::$app->user->getId()]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(\common\models\OrderItem::className(), ['product_id' => 'id']);
    }

    public function getProductOptions()
    {
        return $this->hasMany(ProductOption::className(), ['product_id' => 'id']);
    }

    public function getProductPrices()
    {
        return $this->hasMany(ProductPrice::className(), ['product_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(\common\models\Category::className(), ['id' => 'category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttributeValues()
    {
        return $this->hasMany(\common\models\ProductAttributeValue::className(), ['product_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(\common\models\ProductImage::className(), ['product_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishLists()
    {
        return $this->hasMany(\common\models\WishList::className(), ['product_id' => 'id']);
    }

    public function getReviews()
    {
        return $this->hasMany(\common\models\Review::className(), ['product_id' => 'id']);
    }

    public function getRating()
    {
        $rate = $this->hasMany(\common\models\Review::className(), ['product_id' => 'id'])->average('rate');
        if (!$rate) {
            $rate = 0;
        }

        return $rate;
    }

    public function getPriceMin()
    {
        $price = $this->hasOne(ProductOption::className(), ['product_id' => 'id'])->min('price');
        $price = number_format($price) . ' KZT';
        return $price;
    }

    public function getPriceMax()
    {
        $price = $this->hasOne(ProductOption::className(), ['product_id' => 'id'])->max('price');
        $price = number_format($price) . ' KZT';
        return $price;
    }

    public function isNotEmpty()
    {
        $options = $this->productOptions;
        $qty = 0;
        foreach ($options as $option) {
            $qty += $option->quantity;
        }

        return $qty > 0;
    }

    /**
     * Результаты поиска по каталогу товаров
     */
    public function getSearchResult($search, $page) {
        $search = $this->cleanSearchString($search);
        if (empty($search)) {
            return [null, null];
        }

        // разбиваем поисковый запрос на отдельные слова
        $temp = explode(' ', $search);
        $words = [];
        $stemmer = new LinguaStemRu();
        foreach ($temp as $item) {
            if (iconv_strlen($item) > 3) {
                // получаем корень слова
                $words[] = $stemmer->stem_word($item);
            } else {
                $words[] = $item;
            }
        }
        $relevance = "IF (`name` LIKE '%" . $words[0] . "%', 3, 0)";
        $relevance .= " + IF (`meta_keywords` LIKE '%" . $words[0] . "%', 2, 0)";
        for ($i = 1; $i < count($words); $i++) {
            $relevance .= " + IF (`name` LIKE '%" . $words[$i] . "%', 3, 0)";
            $relevance .= " + IF (`meta_keywords` LIKE '%" . $words[$i] . "%', 2, 0)";
        }
        $query = Product::find()
            ->select([
                '*',
                'relevance' => $relevance
            ])
            ->where(['like', 'name_ru', $words[0]])
            ->orWhere(['like', 'meta_keywords', $words[0]]);
        for ($i = 1; $i < count($words); $i++) {
            $query = $query->orWhere(['like', 'name_ru', $words[$i]]);
            $query = $query->orWhere(['like', 'meta_keywords', $words[$i]]);
        }
        $query = $query->orderBy(['relevance' => SORT_DESC]);

        // посмотрим, какой SQL-запрос был сформирован
//         VarDumper::dump($query->createCommand()->getRawSql(),10,1); die;

        // постраничная навигация
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => Yii::$app->params['pageSize'],
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return [$products, $pages];
    }

    /**
     * Вспомогательная функция, очищает строку поискового запроса с сайта
     * от всякого мусора
     */
    protected function cleanSearchString($search) {
        $search = iconv_substr($search, 0, 64);
        // удаляем все, кроме букв и цифр
        $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);
        // сжимаем двойные пробелы
        $search = preg_replace('#\s+#u', ' ', $search);
        $search = trim($search);
        return $search;
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ]
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\ProductQuery(get_called_class());
    }
}
