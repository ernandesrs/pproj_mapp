<?php

namespace App\Livewire\Helpers\Traits;

trait AsPage
{
    /**
     * Page title
     *
     * @return null|string
     */
    abstract function setPageTitle();

    /**
     * Page breadcrumbs
     *
     * @return array
     */
    abstract function setPageBreadcrumbs();

    /**
     * Page actions
     *
     * @return array
     */
    abstract function setPageActions();

    /**
     * Layout title
     *
     * @return null|string
     */
    function getLayoutTitle()
    {
        return count($this->setPageBreadcrumbs()) ? implode(' » ', array_map(fn($i) => $i['label'], $this->setPageBreadcrumbs())) : $this->setPageTitle();
    }
}
