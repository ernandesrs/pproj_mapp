<?php

namespace App\Livewire\Helpers\Traits;

use App\Livewire\Helpers\Alert;

trait AlertTrait
{
    /**
     * Get helper alert instance
     *
     * @return Alert
     */
    function alert()
    {
        return (new Alert())->toComponent($this);
    }
}
