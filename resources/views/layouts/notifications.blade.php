@if(session('success'))
    <script>
        Swal.fire({
            title: "¡Éxito!",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
@elseif(session('danger'))
    <script>
        Swal.fire({
            title: "¡Éxito!",
            text: "{{ session('danger') }}",
            icon: "success"
        });
    </script>
@endif
