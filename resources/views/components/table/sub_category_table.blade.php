<div id="results" class="d-flex justify-content-start">
    <div class="col-12">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Display Order</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_data as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->categories->name }}</td>
                        <td>{{ $data->name }}
                        </td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->slug }}</td>
                        <td>
                            @switch($data->is_active)
                                @case(1)
                                    <button data-id="{{ $data->id }}" value="0" data-url="{{ route('sub_categories.status.toogle') }}"
                                        class='status-toggle btn btn-success btn-sm'>Active</button>
                                @break

                                @case(0)
                                    <button data-id="{{ $data->id }}" value="1" data-url="{{ route('sub_categories.status.toogle') }}"
                                        class ='status-toggle btn btn-dark btn-sm'>In-active</button>
                                @break

                                @default
                                    <span class="btn btn-secondary btn-sm">Something wrong</span>
                            @endswitch
                        </td>
                        <td>{{ $data->display_order }}</td>
                        <td>{{ date_time_format($data->created_at,'diffForHumans')}}</td>
                        <td>
                            <div class="row-span-2">
                                <button data-url="{{ route('sub_categories.edit') }}" type="button" data-toggle="modal"
                                    data-target="#editSubCategory" data-id="{{ $data->id }}"
                                    class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    @include('backend.admin.subCategory.edit')
                                <button type="button" data-id="{{ $data->id }}"
                                    data-url="{{ route('sub_categories.destroy') }}" class="delete btn btn-danger"><i
                                        class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $all_data->onEachSide(5)->links() }}
    </div>
</div>
