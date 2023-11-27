
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
    <h2>Borrar Servicio</h2>
    <form id="formBorrarServicio" action="borrarServicio.php">
        <div class="form-group">
            <label for="borrarServicioId">Selecciona el Servicio a Borrar:</label>
            <select class="form-control" id="borrarServicioId" name="borrarServicioId" required>
                <!-- Aquí debes cargar dinámicamente las opciones con los nombres de los servicios -->
                <?php
                try {
                    $conexion = Conexion::conectar();

                    $query = $conexion->prepare("SELECT idServicio, nombreServicio FROM servicios");
                    $query->execute();

                    while ($servicio = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $servicio['idServicio'] . '">' . $servicio['nombreServicio'] . '</option>';
                    }

                } catch (PDOException $ex) {
                    echo 'Error al obtener los datos de servicios.';
                }
                ?>
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger">Borrar Servicio</button>
        </div>
    </form>
    <div id="mensaje-exito"></div>
</div>
</div>

<script>
    $(document).ready(function() {
        // Captura el evento de envío del formulario
        $('#formBorrarServicio').submit(function(event) {
            event.preventDefault(); // Evita la recarga de la página

            // Obtiene los datos del formulario
            var formData = $(this).serialize();

            // Realiza una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: 'borrar_servicio.php',
                data: formData,
                success: function(response) {
                    // Muestra la respuesta del servidor en algún elemento HTML
                    $('#mensaje-exito').html(response);

                    // Opcionalmente, puedes limpiar el formulario aquí
                    $('#formBorrarServicio')[0].reset();
                },
                error: function() {
                    // Muestra un mensaje de error si la solicitud falla
                    $('#mensaje-exito').html('Error al borrar el servicio.');
                }
            });
        });
    });
</script>







