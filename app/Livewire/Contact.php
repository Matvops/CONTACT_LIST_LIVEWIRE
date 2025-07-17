<?php

namespace App\Livewire;

use App\Models\Contact as ContactModel;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Contact extends Component
{
    use WithPagination;

    public $search = '';
    
    private $numberElementsPeerPage = 5;

    #[On('contactAdded')]
    public function updateContacts()
    {}

    public function render()
    {
        $contacts = null;

        if($this->search) {
            $contacts = ContactModel::where('nome', 'like', "%$this->search%")
                                        ->orWhere('email', 'like', "%$this->search%")
                                        ->orWhere('phone',  'like', "%$this->search%")
                                        ->paginate($this->numberElementsPeerPage);
        } else {
            $contacts = ContactModel::paginate($this->numberElementsPeerPage);
        }

        return view('livewire.contact', ['contacts' => $contacts]);
    }
}
