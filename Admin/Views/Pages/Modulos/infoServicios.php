
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

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <h2>Servicios</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Servicio</th>
                        <th>Nombre Servicio</th>
                        <th>Descripción Corta</th>
                        <th>Título Servicio</th>
                        <th>Imagen Servicio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $conexion = Conexion::conectar();

                        $query = $conexion->prepare("SELECT * FROM Servicios");
                        $query->execute();

                        while ($servicio = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<td>' . $servicio['idServicio'] . '</td>';
                            echo '<td>' . $servicio['nombreServicio'] . '</td>';
                            echo '<td>' . $servicio['descripcionCorta'] . '</td>';
                            echo '<td>' . $servicio['tituloServicio'] . '</td>';
                            echo '<td>' . $servicio['imgServicio'] . '</td>';
                            echo '<td><a href="#" data-toggle="modal" data-target="#editarServicioModal" data-id="' . $servicio['idServicio'] . '">Editar</a></td>';
                            echo '</tr>';
                        }

                    } catch (PDOException $ex) {
                        echo 'Error al obtener los datos de servicios.';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- ... (código posterior) ... -->

    </section>
    <!-- /.content -->
</div>


<div class="modal fade" id="editarServicioModal" tabindex="-1" role="dialog" aria-labelledby="editarServicioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editarServicioModalLabel">Editar Servicio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formEditarServicio" action="editar_servicios.php">
                    <input type="hidden" id="editServicioId" name="editServicioId" value="">
                    <div class="form-group">
                        <label for="editNombreServicio">Nombre del Servicio:</label>
                        <input type="text" class="form-control" id="editNombreServicio" name="editNombreServicio" >
                    </div>
                    <div class="form-group">
                        <label for="editDescripcionCorta">Descripción Corta:</label>
                        <input type="text" class="form-control" id="editDescripcionCorta" name="editDescripcionCorta" >
                    </div>
                    <div class="form-group">
                        <label for="editTituloServicio">Título del Servicio:</label>
                        <input type="text" class="form-control" id="editTituloServicio" name="editTituloServicio" >
                    </div>
                    <div class="form-group">
                        <label for="editImgServicio">Imagen del Servicio:</label>
                        <input type="text" class="form-control" id="editImgServicio" name="editImgServicio" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Función para mostrar un mensaje de éxito
        function mostrarMensajeExito(mensaje) {
            $('#mensaje-exito').html('<div class="alert alert-success">' + mensaje + '</div>');
        }

        // Captura el evento de envío del formulario de editar servicio
        $('#formEditarServicio').submit(function(event) {
            event.preventDefault(); // Evita la recarga de la página

            // Obtiene los datos del formulario
            var formData = $(this).serialize();

            // Realiza una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: 'editar_servicios.php',
                data: formData,
                success: function(response) {
                    // Muestra el mensaje de éxito
                    mostrarMensajeExito(response);

                    // Cierra el modal
                    $('#editarServicioModal').modal('hide');
                },
                error: function() {
                    // Muestra un mensaje de error si la solicitud falla
                    mostrarMensajeExito('Error al editar el servicio.');
                }
            });
        });
    });
</script>

