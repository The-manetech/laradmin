<?php

namespace Laradmin\Actions;

class RestoreAction extends AbstractAction
{
    public function getTitle()
    {
        return __('laradmin::generic.restore');
    }

    public function getIcon()
    {
        return 'laradmin-trash';
    }

    public function getPolicy()
    {
        return 'restore';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-sm btn-success pull-right restore',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'restore-'.$this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return route('laradmin.'.$this->dataType->slug.'.restore', $this->data->{$this->data->getKeyName()});
    }
}
