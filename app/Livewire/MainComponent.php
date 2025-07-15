<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class MainComponent extends Component
{
    #[Title("Contacts")]
    public function render()
    {
        return view('livewire.main-component');
    }
}
