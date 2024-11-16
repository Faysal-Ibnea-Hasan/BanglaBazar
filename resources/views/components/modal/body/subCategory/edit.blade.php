<form action="{{ route('sub_categories.update') }}" method="POST" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label for="inputGroupSelect01" class="form-label">Category</label>
        <select name="category_id" class="form-select status" id="inputGroupSelect01">
            <option disabled>Category</option>
            @php
                $categories = \App\Models\Category::all();
            @endphp
            @foreach ($categories as $key => $category)
                <option {{$sub_category_details->category_id ?? 'selected'}} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-6">
        <input type="hidden" name="id" value="{{$sub_category_details->id}}">
        <label for="name" class="form-label">Name</label>
        <input type="name" name="name" value="{{$sub_category_details->name}}" class="form-control" id="name">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="display_order" class="form-label">Display Order</label>
        <input type="number" value="{{$sub_category_details->display_order}}" name="display_order" class="form-control" id="display_order">
        @error('display_order')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-md-9">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$sub_category_details->description}}</textarea>
    </div>
    <div class="d-flex flex-row gap-2">
        <div class="form-check">
            <input class="form-check-input" {{$sub_category_details->is_active ? 'checked' : ''}} name="is_active" type="checkbox">
            <label class="form-check-label">
                Active
            </label>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</form>