@php
    $categories = \App\Models\Category::all();
@endphp
<div class="input-group col col-2">
    <label class="input-group-text" for="inputGroupSelect01">Category</label>
    <select class="form-select category" id="inputGroupSelect01">
      <option selected disabled>Select</option>
      @foreach ($categories as $key => $category )
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select>
  </div>