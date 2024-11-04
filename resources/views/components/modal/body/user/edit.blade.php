<form id="userCreateForm" action="{{ route('users.update') }}" method="POST" class="row g-3" autocomplete="off">
    @csrf
    <input type="hidden" name="id" value="{{$user_details->id}}">
    <div class="col-md-6">
        <label for="inputName4" class="form-label">Name</label>
        <input type="name" name="name" value="{{$user_details->name}}" class="form-control" id="inputName4">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" name="email" value="{{$user_details->email}}" class="form-control" id="inputEmail4">
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" name="password" value="{{$user_details->password}}" class="form-control" id="inputPassword4">
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="phoneNumber" class="form-label">Phone Number</label>
        <input type="text" name="phone_number" value="{{$user_details->phone_number}}" class="form-control" id="phoneNumber">
        @error('phone_number')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputAddress" class="form-label">Street</label>
        <input type="text" name="street_address" value="{{$user_details->user_addresses->street_address}}" class="form-control" id="inputAddress"
            placeholder="Street number or address...">
        @error('street_address')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputAddress2" class="form-label">City</label>
        <input type="text" name="city" value="{{$user_details->user_addresses->city}}" class="form-control" id="inputAddress2"
            placeholder="City name">
        @error('city')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputAddress3" class="form-label">District</label>
        <input type="text" name="district" value="{{$user_details->user_addresses->district}}" class="form-control" id="inputAddress3"
            placeholder="District name">
        @error('district')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputAddress4" class="form-label">Division</label>
        <input type="text" name="division" value="{{$user_details->user_addresses->division}}" class="form-control" id="inputAddress4"
            placeholder="Division name">
        @error('division')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="inputAddress5" class="form-label">Postal Code</label>
        <input type="text" name="postal_code" value="{{$user_details->user_addresses->postal_code}}" class="form-control" id="inputAddress5"
            placeholder="Postal Code">
        @error('postal_code')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    {{-- <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip">
    </div> --}}
    <div class="d-flex flex-row gap-2">
        <div class="form-check">
            <input class="form-check-input" {{$user_details->verification_status == 1 ? 'checked':''}} name="verification_status" type="checkbox"
                id="verification_status_gridCheck">
            <label class="form-check-label" for="verification_status_gridCheck">
                Verified
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" {{$user_details->status == 1 ? 'checked':''}} name="status" type="checkbox" id="status_gridCheck">
            <label class="form-check-label" for="status_gridCheck">
                Active
            </label>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</form>