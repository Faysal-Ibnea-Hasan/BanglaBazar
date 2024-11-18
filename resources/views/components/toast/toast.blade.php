{{-- @if (session('toast-success'))
    <script>
        $(document).ready(function() {
            $(document).Toasts('create', {
                title: '{{ session('toast-success.title') }}',
                body: '{{ session('toast-success.body') }}',
                class: 'bg-success',
                autohide: true,
                delay: 3000,
            });
        });
    </script>
@endif --}}
<script type="text/javascript">
    @session("success")
        toastr.success("{{ $value }}");
    @endsession

    @session("info")
        toastr.info("{{ $value }}");
    @endsession

    @session("warning")
        toastr.warning("{{ $value }}");
    @endsession

    @session("error")
        toastr.error("{{ $value }}");
    @endsession
</script>
