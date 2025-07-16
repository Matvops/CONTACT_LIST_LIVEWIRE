<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">

            <h3>EDIT CONTACT</h3>

            <hr>
            
            <div class="card p-5">
                <form wire:submit="update">
    
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
                        <a href="{{ route('home') }}" class="btn btn-secondary px-5">Cancel</a>
                        <button class="btn btn-warning px-5">Update</button>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger my-3 text-center mx-auto"
                            x-data="{ show:true }"
                            x-show="show"
                            x-init="setTimeout(() => show: false, 2000)"
                        >
                            {{session('error')}}
                        </div>
                    @endif
                </form>

            </div>
        </div>
    </div>
</div>

