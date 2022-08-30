<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class duplicate extends AbstractAction
{
    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'bannieres';
    }
    public function getTitle()
    {
        return 'Dupliquer';
    }

    public function getIcon()
    {
        return 'voyager-documentation';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        $id = $this->data->id;
        return route('welcome',['id' =>$id]);
    }
}