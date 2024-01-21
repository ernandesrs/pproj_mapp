<?php

namespace App\Livewire\Dash;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire..dash.home')->layout('livewire.dash.layout');
    }
}
