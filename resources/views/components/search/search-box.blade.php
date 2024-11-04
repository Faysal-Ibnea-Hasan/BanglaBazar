<label for="exampleDataList" class="form-label px-2">Search by anything</label>
<div class="d-flex justify-content-start p-2">
    <input data-url="{{route('users.index')}}" value="{{ request('search') }}" class="search form-control col col-6" id="exampleDataList" placeholder="Type to search...">
    @include('components.dropdown.status',[
        'user_status' => $user_status
    ])
    @include('components.dropdown.status',[
        'user_status' => $user_verification_status
    ])
</div>
