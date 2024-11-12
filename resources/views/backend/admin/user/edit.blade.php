<x-modal title="Update Users" id="userUpdate" size="modal-lg" :centered="true">

</x-modal>
<script>
    @if ($errors->any() && session('formType') ==='edit')
        // Open the modal if there are validation errors
        var exampleModal = new bootstrap.Modal(document.getElementById('userUpdate'));
        exampleModal.show();
    @endif
</script>
