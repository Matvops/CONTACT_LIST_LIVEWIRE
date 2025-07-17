<?php

namespace App\Livewire;

use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

use function Laravel\Prompts\error;

class FormContact extends Component
{
    #[Validate('required|min:3|max:50')]
    public $name;

    #[Validate('required|email|min:5|max:50|unique:contacts,email')]
    public $email;

    #[Validate('required|min:9|max:20')]
    public $phone;

    public function create() {


        try {
            $this->validate();
            /* $this->validate(
                [
                    'name' => ['required', 'min:3', 'max:50'],
                    'email' => ['required', 'email', 'min:10', 'max:50'],
                    'phone' => ['required', 'min:9', 'max:20'],
                ],
            ); */

            DB::beginTransaction();
            $contact = new Contact();
            $contact->nome = $this->name;
            $contact->email = $this->email;
            $contact->phone = $this->phone;
            $contact->save();

            Log::info("Novo contato " . $this->name . ' - ' . $this->email . ' - ' . $this->phone);
            
            $this->reset();

            throw new Exception();

            DB::commit();
            $this->dispatch('contactAdded');
            $this->dispatch(
                'notification',
                type: 'success',
                title: 'Contato cadastrado com sucesso',
                position: 'center'
            );
        } catch(Exception) {
            DB::rollBack();
            $this->dispatch(
                'notification',
                type: 'error',
                title: 'Erro ao cadastrar novo contato',
                position: 'center'
            );
        }
    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
