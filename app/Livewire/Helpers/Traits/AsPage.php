<?php

namespace App\Livewire\Helpers\Traits;

trait AsPage
{
    /**
     * Page title
     *
     * @return null|string
     */
    abstract function getPageTitle();

    /**
     * Page breadcrumbs
     *
     * @return array
     */
    abstract function getPageBreadcrumbs();

    /**
     * Page actions
     *
     * @return array
     */
    abstract function getPageActions();
}
