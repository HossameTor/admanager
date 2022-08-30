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
        return 'Duplicate';
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
        $id = $this->dataType->id;
        return route('welcome',['id' =>$id]);
    }
}