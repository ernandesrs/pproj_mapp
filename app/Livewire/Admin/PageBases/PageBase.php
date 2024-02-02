<?php

namespace App\Livewire\Admin\PageBases;

use Livewire\Component;

abstract class PageBase extends Component
{
    use BaseTrait;

    /**
     * Fails
     *
     * @var array
     */
    protected $fails = [];

    /**
     * The view content
     * Enter the view path from .../livewire/admin/
     *
     * @var string
     */
    public $viewContent = '';

    /**
     * Uncontained
     * When true, page not contains background color and padding
     *
     * @var bool
     */
    public $uncontained = false;

    /**
     * Model class
     *
     * @var null|string
     */
    public $modelClass = null;

    /**
     * Mount
     *
     * @return void
     */
    function mount(...$vars)
    {
        if (empty($this->viewContent)) {
            $this->fails[] = 'Needs a value to public propertie "viewContent"';
        }

        if (count($this->fails)) {
            throw new \Exception(implode(' | ', $this->fails));
        }
    }

    /**
     * Render
     *
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire..admin.page-bases.page-base')
            ->layout('livewire.admin.layout')
            ->title($this->getLayoutTitle());
    }

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

    /**
     * Layout title
     *
     * @return null|string
     */
    function getLayoutTitle()
    {
        return count($this->getPageBreadcrumbs()) ? implode(' » ', array_map(fn($i) => $i['label'], $this->getPageBreadcrumbs())) : $this->getPageTitle();
    }
}
