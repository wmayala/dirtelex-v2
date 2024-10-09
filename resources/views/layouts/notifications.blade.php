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
@elseif(session('warning'))
    <script>
        Swal.fire({
            title: "¡Atención!",
            text: "{{ session('warning') }}",
            icon: "warning"
        });
    </script>
@elseif(session('shareableLink'))
    <script>
        Swal.fire({
            title: "¡Link de registro generado!",
            showConfirmButton: false,
            html: ` <p class="fw-bold">Puede compartir el siguiente enlace:</p><br>
                    <input class="bg-gray-50 border border-gray-800 text-center rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100" type="text" id="copyLink" value="{{ session('shareableLink') }}" readonly><br>
                    <button class="btn mt-3 text-sm uppercase w-50" style="background-color: #111e60; color: #f2f2f2" onclick="copyToClipboard()">Copiar Enlace</button>`,
            icon: "info",
        });

        function copyToClipboard() {
            var copyText = document.getElementById("copyLink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            alert("¡Enlace copiado al portapapeles!");
            Swal.close()
        }
    </script>
@endif
