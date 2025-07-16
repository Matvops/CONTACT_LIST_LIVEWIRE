<div class="card p-5">
    
        <h3>NEW CONTACT</h3>

        <hr>

    <form wire:submit="create">

        <div class="mb-3">
            <label for="name">Name</label>
            <input wire:model="name" type="text" class="form-control" id="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input wire:model="email" type="email" class="form-control" id="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone">Phone</label>
            <input wire:model="phone" type="phone" class="form-control" id="phone">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="text-end">
            <button class="btn btn-secondary px-5">Save</button>
        </div>

        @if($error)
            <div class="alert alert-danger text-center mt-3"
                x-data="{ show:true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 2000)"    
            >
                {{ $error }}
            </div>
        @endif

        @if($success)
            <div class="alert alert-success text-center mt-3"
                x-data="{ show:true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 2000)"    
            >
                {{ $success }}
            </div>
        @endif

    </form>
</div>
