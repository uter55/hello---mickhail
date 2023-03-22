<?php
namespace app\modules\admin\Components;

use yii\grid\ActionColumn;


class ActionColum extends ActionColumn
{
    public $contentOptions = [
//        'style' => 'white-space: nowrap; text-align: center; letter-spacing: 0.1em; max-width: 7em;',
        'class' => 'action-column',
    ];
}