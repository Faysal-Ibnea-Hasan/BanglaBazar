<div class="input-group col col-2">
    <label class="input-group-text" for="inputGroupSelect01">Status</label>
    <select class="form-select status" id="inputGroupSelect01">
      <option selected disabled>Select</option>
      @foreach ($user_status as $key => $status )
      <option value="{{$key}}">{{$status}}</option>
      @endforeach
    </select>
  </div>