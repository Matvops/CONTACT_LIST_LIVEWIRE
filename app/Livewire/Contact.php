<?php

namespace App\Livewire;

use App\Models\Contact as ContactModel;
use Livewire\Attributes\On;
use Livewire\Component;

class Contact extends Component
{
    public $contacts;

    public function mount()
    {
        $this->getContacts();
    }
    
    #[On('contactAdded')]
    public function updateContacts()
    {
        $this->getContacts();
    }

    private function getContacts()
    {
        $this->contacts = ContactModel::all();
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
