<div class="card p-5">

    <p class="mb-3">Contacts</p>

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
