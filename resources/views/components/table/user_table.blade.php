<div id="results" class="d-flex justify-content-start">
    <div class="col-12">
        <table id="example" class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Rating</th>
                    <th>Total Reviews</th>
                    <th>Total Followers</th>
                    <th>Last Login</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}
                            @switch($user->verification_status)
                                @case(\App\Enums\Users\VerificationStatus::verified)
                                    <i class="fas fa-check-circle text-success m-2"></i>
                                @break

                                @default
                            @endswitch
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            @switch($user->status)
                                @case(\App\Enums\Users\Status::active)
                                    <button data-id="{{ $user->id }}" data-url="{{ route('users.status.toogle') }}"
                                        value='{{ \App\Enums\Users\Status::in_active }}' data-type="status"
                                        class='status-toggle btn btn-success btn-sm'>Active</button>
                                @break

                                @case(\App\Enums\Users\Status::in_active)
                                    <button data-id="{{ $user->id }}" data-url="{{ route('users.status.toogle') }}"
                                        value='{{ \App\Enums\Users\Status::active }}' data-type="status"
                                        class ='status-toggle btn btn-dark btn-sm'>In-active</button>
                                @break

                                @case(\App\Enums\Users\Status::suspended)
                                    <span class="btn btn-warning btn-sm">Suspended</span>
                                @break

                                @case(\App\Enums\Users\Status::banned)
                                    <span class="btn btn-danger btn-sm">Banned</span>
                                @break

                                @default
                                    <span class="btn btn-secondary btn-sm">Something wrong</span>
                            @endswitch
                        </td>
                        <td>{{ $user->rating }}</td>
                        <td>{{ $user->total_reviews }}</td>
                        <td>{{ $user->followers->count() }}</td>
                        <td>{{ $user->last_login ? date_time_format($user->last_login, 'diffForHumans') : 'Undefined' }}
                        </td>
                        <td>
                            <div class="row-span-2">
                                <button data-url="{{ route('users.edit') }}" type="button" data-toggle="modal"
                                    data-target="#userUpdate" data-id="{{ $user->id }}"
                                    class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                <button type="button" data-id="{{ $user->id }}"
                                    data-url="{{ route('users.destroy') }}" class="delete btn btn-danger"><i
                                        class="fas fa-trash"></i></button>
                                <button type="button" data-id="{{ $user->id }}"
                                    data-url="{{ route('users.details') }}" data-bs-toggle="modal"
                                    data-bs-target="#userDetails" class="details btn btn-success"><i
                                        class="fas fa-list-alt"></i></button>
                                @switch($user->status)
                                    @case(\App\Enums\Users\Status::banned)
                                        <button type="button" data-id="{{ $user->id }}"
                                            data-url="{{ route('users.status.toogle') }}"
                                            value='{{ \App\Enums\Users\Status::active }}' data-type="status"
                                            class="status-toggle btn btn-success"><i class="fas fa-ban"></i></button>
                                    @break

                                    @default
                                        <button type="button" data-id="{{ $user->id }}"
                                            data-url="{{ route('users.status.toogle') }}"
                                            value='{{ \App\Enums\Users\Status::banned }}' data-type="status"
                                            class="status-toggle btn btn-danger"><i class="fas fa-ban"></i></button>
                                @endswitch

                                <button type="button" class="btn btn-warning"><i class="fas fa-ban"></i></button>
                                @switch($user->verification_status)
                                    @case(\App\Enums\Users\VerificationStatus::verified)
                                        <button type="button" data-id="{{ $user->id }}"
                                            data-url="{{ route('users.status.toogle') }}" data-type="verification"
                                            value='{{ \App\Enums\Users\VerificationStatus::un_verified }}'
                                            class="status-toggle btn btn-danger">
                                            <i class="fas fa-user-check"></i>
                                        </button>
                                    @break

                                    @default
                                        <button type="button" data-id="{{ $user->id }}"
                                            data-url="{{ route('users.status.toogle') }}" data-type="verification"
                                            value='{{ \App\Enums\Users\VerificationStatus::verified }}'
                                            class="status-toggle btn btn-success">
                                            <i class="fas fa-user-check"></i>
                                        </button>
                                @endswitch
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $all_users->onEachSide(5)->links() }}
    </div>
</div>
