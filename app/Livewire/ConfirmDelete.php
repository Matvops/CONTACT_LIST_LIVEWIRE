<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ConfirmDelete extends Component
{
    
    public Contact $contact;

    public function mount($id)
    {
        $this->contact = Contact::find($id);
    }

    public function cancel()
    {
        return redirect()->route('home');
    }

    public function delete()
    {
        $this->contact->delete();
        return redirect()->route('home');
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.confirm-delete');
    }
}
