
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CMS Advisor Control Panel
        <small>Contenido</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de control</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Blog</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">



<!-- mostrar_comentarios.view.php -->

<div class="container mt-5">
    <h2>Comentarios</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre de Usuario</th>
                <th>Correo de Usuario</th>
                <th>Contenido del Comentario</th>
                <th>Fecha del Comentario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL para obtener datos de la tabla Comentarios_Blog
            // Ajusta la consulta según las columnas necesarias.
            try {
                $conexion = Conexion::conectar(); // Configura tu conexión a la base de datos.

                $query = $conexion->prepare("SELECT idComentarioBlog, nombreUsuario, correoUsuario, contenidoComentario, fechaComentario FROM Comentarios_Blogs");
                $query->execute();

                while ($comentario = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $comentario['nombreUsuario'] . '</td>';
                    echo '<td>' . $comentario['correoUsuario'] . '</td>';
                    echo '<td>' . $comentario['contenidoComentario'] . '</td>';
                    echo '<td>' . $comentario['fechaComentario'] . '</td>';
                    
                    // Agrega un botón de eliminación con llamada AJAX
                    echo '<td>';
                    echo '<button class="btn btn-danger btn-sm" onclick="eliminarComentario(' . $comentario['idComentarioBlog'] . ')">Eliminar</button>';
                    echo '</td>';
                    
                    echo '</tr>';
                }

            } catch (PDOException $ex) {
                echo 'Error al obtener los comentarios.';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Script AJAX para eliminar comentarios -->
<script>
    // Función para eliminar un comentario y actualizar la tabla
    function eliminarComentario(idComentario) {
        $.ajax({
            type: 'GET',
            url: 'eliminar_comentario.php?id=' + idComentario,
            success: function (response) {
                alert(response); // Muestra un mensaje de éxito o error
                
                // Recarga la tabla de comentarios si la eliminación fue exitosa
                if (response === 'Comentario eliminado con éxito') {
                    // Puedes recargar la página o actualizar la tabla aquí
                    location.reload(); // Recarga la página completa
                }
            },
            error: function () {
                alert('Error al eliminar el comentario');
            }
        });
    }
</script>



        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  