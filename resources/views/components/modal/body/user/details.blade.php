<div class="flow-root">
    <dl class="-my-3 divide-y divide-gray-100 text-sm">
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Name</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->name }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Email</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->email }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Phone Number</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->phone_number }}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Is Seller</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->is_seller ? 'Yes' : 'No' }}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Address Type</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->address_type ? 'Billing' : 'Shipping'}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Street Address</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->street_address}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">City</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->city}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">District</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->district}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Division</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->division}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Country</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->country}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Bio</dt>
            <dd class="text-gray-700 sm:col-span-2">
                {{ $user_details->bio ?? 'Not defined' }}
            </dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Last login</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->last_login ?? 'Not defined' }}</dd>
        </div>
    </dl>
</div>
