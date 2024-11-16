<div class="d-flex justify-content-center my-2">
    <img src="{{asset('storage/users/' .$user_details->profile_picture)}}" height="100" width="100" class="rounded-circle bg-dark" alt="...">
    <div class="file-upload">
        <label for="file-input">
            <i class="fas fa-upload"></i> <!-- Font Awesome icon -->
        </label>
        <input class="userImageUpload" type="file" name="image" id="file-input" data-id="{{$user_details->id}}" data-url="{{route('users.imageUpload')}}" />
    </div>
</div>
<div class="flow-root">
    <dl class="-my-3 divide-y divide-gray-100 text-sm">
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Name</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->name }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Email</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->email }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Phone Number</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->phone_number }}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Is Seller</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->is_seller ? 'Yes' : 'No' }}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Address Type</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->address_type ? 'Billing' : 'Shipping'}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Street Address</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->street_address}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">City</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->city}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">District</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->district}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Division</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->division}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Country</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->user_addresses->country}}</dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Bio</dt>
            <dd class="text-gray-700 sm:col-span-2">
                {{ $user_details->bio ?? 'Not defined' }}
            </dd>
        </div>
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 d-flex justify-content-between">
            <dt class="font-bold text-gray-900">Last login</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $user_details->last_login ?? 'Not defined' }}</dd>
        </div>
    </dl>
</div>
<script>
$(function() {
    $(".userImageUpload").on("change", function () {
        var id = $(this).data("id");
        var file = this.files[0]; // Get the selected file
        console.log(file);
        // Check if a file is selected
        if (!file) {
            console.error("No file selected");
            return;
        }
        var formData = new FormData();
        formData.append("id", id); // Append the user ID
        formData.append("image", file); // Append the file
        $.ajax({
            url: $(this).data("url"),
            type: "POST",
            dataType: "JSON",
            data: formData,
            contentType: false, // Important for file uploads
            processData: false, // Prevent jQuery from processing the data
            success: function (response) {
                if (response.status) {
                    location.reload(); // Reload the page if successful
                } else {
                    console.error(response.message || "Upload failed");
                }
            },
            error: function (xhr) {
                console.error("An error occurred:", xhr.responseText);
            },
        });
    });
})
</script>
