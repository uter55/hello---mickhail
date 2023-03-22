<?php

namespace app\modules\admin\Components;
use app\modules\admin\models\User;
use yii\grid\DataColumn;
use yii\helpers\Html;
use app\modules\admin\models\Order;





class UserStatusColumn   extends DataColumn
{
    protected function renderDataCellContent($model, $key, $index)
    {
        /** @var User $model */
        $value = $this->getDataCellValue($model, $key, $index);
        switch ($value) {
            case Order::STATUS_ACTIVE:
                $class = 'success';
                break;
            case Order::STATUS_WAIT:
                $class = 'warning';
                break;
            case Order::STATUS_BLOCKED:
            default:
                $class = 'default';
        };
        $html = Html::tag('span', Html::encode($model->getStatusName()), ['class' => 'label label-' . $class]);
        return $value === null ? $this->grid->emptyCell : $html;
    }
}