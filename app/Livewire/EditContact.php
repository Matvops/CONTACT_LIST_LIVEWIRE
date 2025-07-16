<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditContact extends Component
{   
    #[Validate('required|min:3|max:50')]
    public $name;

    #[Validate('required|email|min:5|max:50')]
    public $email;

    #[Validate('required|min:9|max:20')]
    public $phone;

    public Contact $contact;

    public function mount($id) 
    {
        $this->contact = Contact::find($id);
        $this->name = $this->contact->nome;
        $this->email = $this->contact->email;
        $this->phone = $this->contact->phone;
    }

    public function update()
    {
        $this->validate();

        if(Contact::where('email', $this->email)
                    ->where('id', '!=', $this->contact->id)
                    ->exists())
        {
            return back()->withInput()->with('error', 'Contact already exists');
        }

        $this->contact->nome = $this->name;
        $this->contact->email = $this->email;
        $this->contact->phone = $this->phone;
        $this->contact->save();
        
        return redirect()->route('home');
    }

    #[Layout('components.layouts.app')]
    #[Title('EDIT CONTACT')]
    public function render()
    {
        return view('livewire.edit-contact');
    }
}
