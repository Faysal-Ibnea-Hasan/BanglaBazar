<!-- Modal -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update User Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="editModal">

            </div>
        </div>
    </div>
</div>

<script>
    @if ($errors->any() && session('formType') ==='edit')
        // Open the modal if there are validation errors
        var exampleModal = new bootstrap.Modal(document.getElementById('exampleModalEdit'));
        exampleModal.show();
    @endif
</script>
