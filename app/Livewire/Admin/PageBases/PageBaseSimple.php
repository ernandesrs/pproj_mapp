<?php

namespace App\Livewire\Admin\PageBases;

abstract class PageBaseSimple extends PageBase
{
    function indexRouteName()
    {
        return null;
    }

    function createRouteName()
    {
        return null;
    }

    function showRouteName()
    {
        return null;
    }

    function editRouteName()
    {
        return null;
    }

    function setPageCreateAction()
    {
        return null;
    }
}
