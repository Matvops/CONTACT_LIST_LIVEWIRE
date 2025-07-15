<div>
    <div class="text-center">
        Tem certeza que deseja excluir?
        <p>Name: <br><strong>{{ $contact->nome }}</strong></p>
        <p>Email: <br><strong>{{ $contact->email }}</strong></p>
        <p>Phone: <br><strong>{{ $contact->phone }}</strong></p>
        <button  wire:click="cancel" class="btn btn-primary px-5">No</button>
        <button  wire:click="delete" class="btn btn-danger px-5">Yes</button>
    </div>
</div>
