<?php

namespace KCS;

use KCS\Entities\Car as CarBase;

class Car extends CarBase
{
    public function changeColor(string $color)
    {
        echo 'Katik pakeiciau spalva i : ' . $color . '<br>';
        $this->color = $color;
    }
}