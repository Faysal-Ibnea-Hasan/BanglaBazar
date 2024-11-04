@if (session('toast-success'))
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
@endif