
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CMS Advisor Control Panel
            <small>Información</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Panel de informacion</li>
        </ol>
    </section>


    <div class="container">
    <h2>Agregar Nuevo Servicio</h2>
    <form id="formAgregarServicio" enctype="multipart/form-data"> <!-- Agrega enctype para el manejo de archivos -->
        <div class="form-group">
            <label for="nombreServicio">Nombre del Servicio:</label>
            <input type="text" class="form-control" id="nombreServicio" name="nombreServicio" required>
        </div>
        <div class="form-group">
            <label for="descripcionCorta">Descripción Corta:</label>
            <input type="text" class="form-control" id="descripcionCorta" name="descripcionCorta" required>
        </div>
        <div class="form-group">
            <label for="tituloServicio">Título del Servicio:</label>
            <input type="text" class="form-control" id="tituloServicio" name="tituloServicio" required>
        </div>
        <div class="form-group">
            <label for="imgServicio">Imagen del Servicio:</label>
            <input type="file" class="form-control" id="imgServicio" name="imgServicio" required accept="image/*"> <!-- Input para cargar imágenes -->
        </div>
        <div class="form-group">
            <label for="idCategoriaService">ID de Categoría:</label>
            <input type="text" class="form-control" id="idCategoriaService" name="idCategoriaService" required>
        </div>
        <div class="form-group">
            <label for="rutaServicio">Ruta del Servicio:</label>
            <input type="text" class="form-control" id="rutaServicio" name="rutaServicio" required>
        </div>
        <div class="form-group">
            <label for="textoServicio">Texto del Servicio:</label>
            <textarea class="form-control" id="textoServicio" name="textoServicio" required></textarea>
        </div>
        <div class="form-group">
            <label for="palabrasClavesServicio">Palabras Claves:</label>
            <input type="text" class="form-control" id="palabrasClavesServicio" name="palabrasClavesServicio" required>
        </div>
        <div class="form-group">
            <label for="sliderServicio">Slider del Servicio:</label>
            <input type="file" class="form-control" id="sliderServicio" name="sliderServicio" required accept="image/*"> <!-- Input para cargar imágenes -->
        </div>
        <input type="hidden" id="estatusServicio" name="estatusServicio" value="1">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Agregar Servicio</button>
        </div>
    </form>
    <div id="mensaje-exito"></div>
    </div>




</div>            

                <!-- FUNCION AJAX PARA SUBIR SERVICIO -->
<script>
    $(document).ready(function() {
        // Captura el evento de envío del formulario
        $('#formAgregarServicio').submit(function(event) {
            event.preventDefault(); // Evita la recarga de la página

            // Obtiene los datos del formulario
            var formData = $(this).serialize();

            // Realiza una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: 'agregarServicio.php',
                data: formData,
                success: function(response) {
                    // Muestra la respuesta del servidor en algún elemento HTML
                    $('#mensaje-exito').html(response);

                    // Opcionalmente, puedes limpiar el formulario aquí
                    $('#formAgregarServicio')[0].reset();
                },
                error: function() {
                    // Muestra un mensaje de error si la solicitud falla
                    $('#mensaje-exito').html('Error al agregar el servicio.');
                }
            });
        });
    });
</script>