{{-- Large modal --}}
<x-modal title="Create Users" id="userCreate" size="modal-lg" :centered="true">
    <form action="{{ route('users.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label for="inputName4" class="form-label">Name</label>
            <input type="name" name="name" class="form-control" id="inputName4">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" id="phoneNumber">
            @error('phone_number')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputAddress" class="form-label">Street</label>
            <input type="text" name="street_address" class="form-control" id="inputAddress"
                placeholder="Street number or address...">
            @error('street_address')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputAddress2" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="inputAddress2"
                placeholder="City name">
            @error('city')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputAddress3" class="form-label">District</label>
            <input type="text" name="district" class="form-control" id="inputAddress3"
                placeholder="District name">
            @error('district')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputAddress4" class="form-label">Division</label>
            <input type="text" name="division" class="form-control" id="inputAddress4"
                placeholder="Division name">
            @error('division')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="inputAddress5" class="form-label">Postal Code</label>
            <input type="text" name="postal_code" class="form-control" id="inputAddress5"
                placeholder="Postal Code">
            @error('postal_code')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="d-flex flex-row gap-2">
            <div class="form-check">
                <input class="form-check-input" name="verification_status" type="checkbox"
                    id="verification_status_gridCheck">
                <label class="form-check-label" for="verification_status_gridCheck">
                    Verified
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="status" type="checkbox" id="status_gridCheck">
                <label class="form-check-label" for="status_gridCheck">
                    Active
                </label>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Create</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
</x-modal>

{{-- <script>
    @if ($errors->any() && session('formType') ==='create')
        // Open the modal if there are validation errors
        var exampleModal = new bootstrap.Modal(document.getElementById('userCreate'));
        exampleModal.show();
    @endif
</script> --}}
