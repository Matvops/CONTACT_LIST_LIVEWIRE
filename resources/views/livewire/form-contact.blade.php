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

        <script>

            window.addEventListener('notification', (event) => {
                
                let data = event.detail;

                Swal.fire({
                    icon: data.type,
                    title: data.title,
                    position: data.position,
                    showConfirmButton: false,
                    timer: 2000
                });
            })

        </script>

    </form>
</div>
