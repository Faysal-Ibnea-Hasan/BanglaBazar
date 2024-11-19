<form action="{{ route('categories.update') }}" method="POST" class="row g-3">
    @csrf
    <div class="col-md-6">
        <input type="hidden" name="id" value="{{$category_details->id}}">
        <label for="name" class="form-label">Name</label>
        <input type="name" name="name" value="{{$category_details->name}}" class="form-control" id="name">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="display_order" class="form-label">Display Order</label>
        <input type="number" value="{{$category_details->display_order}}" name="display_order" class="form-control" id="display_order">
        @error('display_order')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-9">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$category_details->description}}</textarea>
    </div>
    <div class="d-flex flex-row gap-2">
        <div class="form-check">
            <input class="form-check-input" {{$category_details->is_active ? 'checked' : ''}} name="is_active" type="checkbox">
            <label class="form-check-label">
                Active
            </label>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>