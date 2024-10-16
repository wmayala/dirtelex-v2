<script>
    function confirmDelete(contactId){
        Swal.fire({
            title: '¿Eliminar?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: false,
            allowEscapeKey: false,
        }).then((result)=>{
            if(result.isConfirmed) {
                document.getElementById('delete-form-'+contactId).submit();
            }
        });
    }
</script>
