<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
        </h1>
        <ol class="breadcrumb">
            <li><a href="Inicio"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Crea una nueva entrada de blog</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Subir entrada</h3>
                    </div>

                    <div class="container mt-5">
                        <form action="entradaBlog.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="tituloBlog">Título del Blog:</label>
                                <input type="text" class="form-control" id="tituloBlog" name="tituloBlog">
                            </div>
                            <div class="form-group">
                                <label for="descripcionCorta">Descripción Corta:</label>
                                <input type="text" class="form-control" id="descripcionCorta" name="descripcionCorta">
                            </div>
                            <div class="form-group">
                                <label for="contenidoBlog">Contenido del Blog:</label>
                                <textarea id="editor1" name="contenidoBlog" rows="10" cols="80"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="descripcionBlog">Descripción del Blog:</label>
                                <input type="text" class="form-control" id="descripcionBlog" name="descripcionBlog">
                            </div>
                            <div class="form-group">
                                <label for="imagenBlog">Imagen del Blog:</label>
                                <input type="file" class="form-control-file" id="imagenBlog" name="imagenBlog">
                            </div>
                            <div class="form-group">
                                <label for="portadaBlog">Portada del Blog:</label>
                                <input type="file" class="form-control-file" id="portadaBlog" name="portadaBlog">
                            </div>
                            <div class="form-group">
                                <label for="categoriaBlog">Categoría del Blog:</label>
                                <select class="form-control" id="categoriaBlog" name="categoriaBlog">
                                    <!-- Aquí debes cargar las categorías existentes desde la base de datos -->
                                    <!-- Puedes usar PHP para generar las opciones del select -->
                                    <?php
                                    try {
                                        $conexion = Conexion::conectar();
                                        $query = $conexion->prepare("SELECT * FROM Categoria_Blog");
                                        $query->execute();

                                        while ($categoria = $query->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $categoria['idCategoriaBlog'] . '">' . $categoria['nombreCBlog'] . '</option>';
                                        }
                                    } catch (PDOException $ex) {
                                        echo 'Error al obtener las categorías.';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="palabrasClavesBlog">Palabras Claves:</label>
                                <input type="text" class="form-control" id="palabrasClavesBlog" name="palabrasClavesBlog">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    CKEDITOR.replace('contenidoBlog');
</script>
<script>
    $(document).ready(function() {
        // Captura el evento de envío del formulario
        $('form').submit(function(event) {
            event.preventDefault(); // Evita la recarga de la página

            // Crea un objeto FormData para recopilar los datos del formulario
            var formData = new FormData(this);

            // Agrega los valores seleccionados en el campo de categoría y palabras clave
            var categoriaBlog = $('#categoriaBlog').val();
            var palabrasClavesBlog = $('#palabrasClavesBlog').val();
            formData.append('categoriaBlog', categoriaBlog);
            formData.append('palabrasClavesBlog', palabrasClavesBlog);

            // Realiza una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: 'entradaBlog.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Muestra el mensaje de éxito
                    mostrarMensajeExito(response);
                },
                error: function() {
                    // Muestra un mensaje de error si la solicitud falla
                    mostrarMensajeExito('Error al crear la nueva entrada de blog.');
                }
                
            });
        });

        // Función para mostrar un mensaje de éxito
        function mostrarMensajeExito(mensaje) {
            // Puedes mostrar el mensaje de éxito donde desees en tu página
            // Aquí, simplemente lo mostramos como una alerta
            alert(mensaje);
        }
    });
</script>
