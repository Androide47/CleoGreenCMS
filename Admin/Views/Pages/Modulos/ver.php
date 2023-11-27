<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CMS Advisor Control Panel
            <small>Contenido</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Ver</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="container">
                <h2>Entradas de Blog</h2>
                <table class="table table-bordered" id="blogTable">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción Corta</th>
                            <th>Contenido</th>
                            <th>Fecha de Entrada</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Configura tu conexión a la base de datos (utiliza tu propio método de conexión).
                        try {
                            $conexion = Conexion::conectar();

                            // Realiza una consulta SQL para obtener las entradas de blog.
                            $query = $conexion->prepare("SELECT * FROM Blogs");
                            $query->execute();

                            // Recorre los resultados y muestra cada entrada en filas de la tabla.
                            while ($entrada = $query->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>';
                                echo '<td>' . $entrada['tituloBlog'] . '</td>';
                                echo '<td>' . $entrada['descripcionCorta'] . '</td>';
                                echo '<td>' . $entrada['contenidoBlog'] . '</td>';
                                echo '<td>' . $entrada['fechaPublicacion'] . '</td>';
                                echo '<td><img src="../FrontEnd/Views/assets/images/blog/post-images/' . $entrada['imgBlogPrincipal'] . '" alt="Imagen del Blog" width="100"></td>';
                                echo '<td><button class="btn btn-danger delete-blog" data-blog-id="' . $entrada['idBlog'] . '">Eliminar</button></td>';
                                echo '</tr>';
                            }

                        } catch (PDOException $ex) {
                            // Manejar cualquier excepción de la base de datos aquí.
                            echo 'Error al obtener las entradas de blog.';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<script>
  $(document).ready(function() {
    // Manejar clic en el botón Eliminar
    $('#blogTable').on('click', '.delete-blog', function() {
        var blogId = $(this).data('blog-id');
        var confirmation = confirm('¿Estás seguro de que deseas eliminar esta entrada de blog?');

        if (confirmation) {
            // Realizar una solicitud AJAX para eliminar la entrada de blog
            $.ajax({
                type: 'POST',
                url: 'eliminarBlog.php', // Reemplaza 'eliminarBlog.php' con el archivo que maneja la eliminación
                data: { id: blogId },
                success: function(response) {
                    // Actualizar la tabla después de la eliminación
                    // Puedes recargar la página completa o eliminar la fila de la tabla sin recargar
                    $('#blogTable').find('tr[data-blog-id="' + blogId + '"]').remove();
                    alert(response); // Mostrar mensaje de éxito
                },
                error: function() {
                    alert('Error al eliminar la entrada de blog.');
                }
            });
        }        setTimeout(function() {
                window.location.reload();
            }, 500);
    });
});

</script>