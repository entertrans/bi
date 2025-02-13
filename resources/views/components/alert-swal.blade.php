@if (session('success') || session('error') || session('warning'))
    @php
        $alertType = session('success') ? 'success' : (session('error') ? 'error' : 'warning');
        $alertText = session('success') ?? session('error') ?? session('warning');
    @endphp
    <script>
        Swal.fire({
            title: '{{ ucfirst($alertType) }}!',
            text: '{{ $alertText }}',
            icon: '{{ $alertType }}',
            showConfirmButton: false,
            timer: 2500,
            toast: true,
            position: 'top-end'
        });
    </script>
@endif
