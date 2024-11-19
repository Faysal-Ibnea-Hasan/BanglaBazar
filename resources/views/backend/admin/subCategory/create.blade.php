{{-- Large modal --}}
<x-modal title="Create Sub-Categories" id="subCategoryCreate" size="modal-lg" :centered="true">
    <form action="{{ route('sub_categories.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label for="inputGroupSelect01" class="form-label">Category</label>
            <select name="category_id" class="form-select status" id="inputGroupSelect01">
                <option selected disabled>Category</option>
                @php
                    $categories = \App\Models\Category::all();
                @endphp
                @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="name" name="name" class="form-control" onkeyup="generateSlug()" id="name">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" readonly>
            @error('slug')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="display_order" class="form-label">Display Order</label>
            <input type="number" name="display_order" class="form-control" id="display_order">
            @error('display_order')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-9">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="d-flex flex-row gap-2">
            <div class="form-check">
                <input class="form-check-input" name="is_active" type="checkbox">
                <label class="form-check-label">
                    Active
                </label>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Create</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
</x-modal>

<script>
    @if ($errors->any() && session('formType') === 'create')
        // Open the modal if there are validation errors
        var exampleModal = new bootstrap.Modal(document.getElementById('userCreate'));
        exampleModal.show();
    @endif
</script>
