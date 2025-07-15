<?php

namespace App\Livewire;

use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormContact extends Component
{
    #[Validate('required|min:3|max:50')]
    public $name;

    #[Validate('required|email|min:5|max:50|unique:contacts,email')]
    public $email;

    #[Validate('required|min:9|max:20')]
    public $phone;

    public $error = "";

    public $success = "";

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
            throw new Exception();
            Log::info("Novo contato " . $this->name . ' - ' . $this->email . ' - ' . $this->phone);

            $this->reset();
            
            $this->success = "Contato cadastrado com sucesso";

            DB::commit();
        } catch(Exception) {
            DB::rollBack();
            $this->error = "Erro ao cadastrar novo contato";
        }
    }

    public function render()
    {
        return view('livewire.form-contact');
    }
}
