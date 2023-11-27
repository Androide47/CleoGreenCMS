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
    <div class="container">
            <h2>Información del Sitio</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Info Sitio</th>
                        <th>Dominio</th>
                        <th>Título</th>
                        <th>Portada</th>
                        <th>Descripción Empresa</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $conexion = Conexion::conectar();

                        $query = $conexion->prepare("SELECT * FROM info_sitio");
                        $query->execute();

                        while ($info = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr>';
                            echo '<td>' . $info['idInfoSitio'] . '</td>';
                            echo '<td>' . $info['dominio'] . '</td>';
                            echo '<td>' . $info['titulo'] . '</td>';
                            echo '<td>' . $info['portada'] . '</td>';
                            echo '<td>' . $info['descripcionEmpresa'] . '</td>';
                            echo '<td><a href="#" data-toggle="modal" data-target="#editarInfoModal" data-id="' . $info['idInfoSitio'] . '">Editar</a></td>';
                            echo '</tr>';
                        }

                    } catch (PDOException $ex) {
                        echo 'Error al obtener los datos de info_sitio.';
                    }
                    ?>
                </tbody>
            </table>
        </div>


</div>    

<!-- Modals for editing info_sitio -->
<div class="modal fade" id="editarInfoModal" tabindex="-1" role="dialog" aria-labelledby="editarInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editarInfoModalLabel">Editar Información del Sitio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formEditarInfo">
                    <input type="hidden" id="editInfoId" name="editInfoId" value="">
                    <div class="form-group">
                        <label for="editDominio">Dominio:</label>
                        <input type="text" class="form-control" id="editDominio" name="editDominio">
                    </div>
                    <div class="form-group">
                        <label for="editTitulo">Título:</label>
                        <input type="text" class="form-control" id="editTitulo" name="editTitulo" >
                    </div>
                    <div class="form-group">
                        <label for="editPortada">Portada:</label>
                        <input type="text" class="form-control" id="editPortada" name="editPortada">
                    </div>
                    <div class="form-group">
                        <label for="editDescripcionEmpresa">Descripción Empresa:</label>
                        <textarea class="form-control" id="editDescripcionEmpresa" name="editDescripcionEmpresa" rows="4" ></textarea>
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

        // Captura el evento de envío del formulario de editar información del sitio
        $('#formEditarInfo').submit(function(event) {
            event.preventDefault(); // Evita la recarga de la página

            // Obtiene los datos modificados del formulario
            var editInfoId = $('#editInfoId').val();
            var editDominio = $('#editDominio').val();
            var editTitulo = $('#editTitulo').val();
            var editPortada = $('#editPortada').val();
            var editDescripcionEmpresa = $('#editDescripcionEmpresa').val();

            // Realiza una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: 'editar_info_sitio.php',
                data: {
                    editInfoId: editInfoId,
                    editDominio: editDominio,
                    editTitulo: editTitulo,
                    editPortada: editPortada,
                    editDescripcionEmpresa: editDescripcionEmpresa
                },
                success: function(response) {
                    // Muestra el mensaje de éxito
                    mostrarMensajeExito(response);

                    // Cierra el modal
                    $('#editarInfoModal').modal('hide');
                },
                error: function() {
                    // Muestra un mensaje de error si la solicitud falla
                    mostrarMensajeExito('Error al editar la información del sitio.');
                }
            });
        });
    });
</script>

