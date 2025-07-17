<?php

namespace App\Livewire;

use App\Models\Contact as ContactModel;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Contact extends Component
{

    use WithPagination;
    
    #[On('contactAdded')]
    public function updateContacts()
    {}

    public function render()
    {
        return view('livewire.contact', ['contacts' => ContactModel::paginate(2)]);
    }
}
