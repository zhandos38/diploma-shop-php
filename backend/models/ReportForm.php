<?php


namespace backend\models;


use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class ReportForm extends Model
{
    public $dateRange;
    public $dateStart;
    public $dateEnd;

    private $_dateRange;

    public function rules()
    {
        return [
            [['dateRange'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
        ];
    }

    public function search()
    {
        $this->_dateRange = preg_replace('/\s+/', '', $this->dateRange);
        $this->_dateRange = explode('-', $this->dateRange);

        $this->dateStart = trim(str_replace('.','-', $this->_dateRange[0]));
        $this->dateEnd = trim(str_replace('.','-', $this->_dateRange[1]));

        $query = Yii::$app->db->createCommand('
                select DATE_FORMAT(FROM_UNIXTIME(t1.created_at), \'%Y-%m-%d\') as date, sum(t1.cost) as cost_sum, count(t1.id) as qty, avg(t1.cost) as cost_avg, sum((t2.cost - t2.price_in) * t2.quantity) as profit
                from {{%order}} as t1
                left join {{%order_item}} as t2 on t1.id = t2.order_id
                where DATE_FORMAT(FROM_UNIXTIME(t1.created_at), \'%Y-%m-%d\') >= ' . "'$this->dateStart'" . '
                and DATE_FORMAT(FROM_UNIXTIME(t1.created_at), \'%Y-%m-%d\') <= ' . "'$this->dateEnd'" . '
                group by date
        ')->queryAll();

        return $query;
    }
}