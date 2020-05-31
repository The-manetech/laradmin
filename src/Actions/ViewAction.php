<?php

namespace Laradmin\Actions;

class ViewAction extends AbstractAction
{
    public function getTitle()
    {
        return __('laradmin::generic.view');
    }

    public function getIcon()
    {
        return 'laradmin-eye';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-warning pull-right view',
        ];
    }

    public function getDefaultRoute()
    {
        return route('laradmin.'.$this->dataType->slug.'.show', $this->data->{$this->data->getKeyName()});
    }
}
