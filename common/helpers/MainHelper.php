<?php
namespace common\helpers;

class MainHelper
{
    public function date($date) {
        return date('d-m-Y H:i', $date);
    }
}