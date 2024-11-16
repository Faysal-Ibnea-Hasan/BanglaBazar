{{-- Large modal --}}
<x-modal title="Edit Sub-Category Details" id="editSubCategory" size="modal-lg" :centered="true">

</x-modal>

<script>
    @if ($errors->any() && session('formType') ==='create')
        // Open the modal if there are validation errors
        var exampleModal = new bootstrap.Modal(document.getElementById('userCreate'));
        exampleModal.show();
    @endif
</script>