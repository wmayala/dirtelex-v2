@csrf
@method('DELETE')
<button type="button" onclick="confirmDelete()">
    <i class="fa fa-trash" aria-hidden="true"></i>
</button>

<script>
    function confirmDelete(){
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
                document.getElementById('delete-form').submit();

            }
        });
    }
</script>
