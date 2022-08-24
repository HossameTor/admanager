<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class Multidatepicker extends AbstractHandler
{
    protected $codename = 'Multidatepicker';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.Multidatepicker', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}