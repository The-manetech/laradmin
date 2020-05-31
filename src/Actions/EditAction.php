<?php

namespace Laradmin\Actions;

class EditAction extends AbstractAction
{
    public function getTitle()
    {
        return __('laradmin::generic.edit');
    }

    public function getIcon()
    {
        return 'laradmin-edit';
    }

    public function getPolicy()
    {
        return 'edit';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right edit',
        ];
    }

    public function getDefaultRoute()
    {
        return route('laradmin.'.$this->dataType->slug.'.edit', $this->data->{$this->data->getKeyName()});
    }
}
