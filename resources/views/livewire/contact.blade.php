<div class="card p-5">

    <div class="d-flex justify-content-between mb-3">
        
        <div>
            <h3 class="mb-3">Contacts</h3>
        </div>

        <div class="d-flex align-items-center gap-2">
            <span>Search: </span>
            <input type="text" class="form-control form-control-sm" wire:model.live='search'>
        </div>

    </div>


    @if ($contacts->count() === 0)
        <div class="opacity-50">
            No contacts found
        </div>
    @else
        @foreach($contacts as $contact)
            <div class="card p-3 mb-1 bg-dark">
                <div class="row">
                    <div class="col">Name: {{ $contact->nome }}</div>
                    <div class="col">Email: {{ $contact->email }}</div>
                    <div class="col">Phone: {{ $contact->phone }}</div>
                    <div class="col">
                        <a href="{{ route('contact.edit', ['id' => $contact->id]) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('contact.delete', ['id' => $contact->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach

        <div>
            {{ $contacts->links() }}
        </div>
    @endif
</div>
