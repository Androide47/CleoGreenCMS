<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- editar_blog.view.php -->

<!-- editar_blog.view.php -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Blogs
        </h1>
        <ol class="breadcrumb">
            <li><a href="Inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Editar Blogs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- editar_blog.view.php -->

            <div class="container mt-5">
                <h2>Editar Blog</h2>
                <form action="editar_blog.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="selectBlog">Selecciona un Blog:</label>
            <select class="form-control" id="selectBlog" name="idBlog">
                <!-- Aquí debes cargar dinámicamente las opciones con los títulos de los blogs -->
                <?php
                try {
                    $conexion = Conexion::conectar(); // Configura tu conexión a la base de datos.
                    $query = $conexion->prepare("SELECT idBlog, tituloBlog FROM Blogs");
                    $query->execute();

                    while ($blog = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $blog['idBlog'] . '">' . $blog['tituloBlog'] . '</option>';
                    }

                } catch (PDOException $ex) {
                    echo 'Error al obtener los blogs.';
                }
                ?>
            </select>
        </div>
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

        <input type="hidden" name="hiddenContenidoBlog" id="hiddenContenidoBlog">
        
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
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
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

        // Actualiza el campo oculto con el contenido del CKEditor
        var contenidoCKEditor = CKEDITOR.instances.editor1.getData();
        $('#hiddenContenidoBlog').val(contenidoCKEditor);

        // Crea un objeto FormData para recopilar los datos del formulario
        var formData = new FormData(this);

        // Realiza una solicitud AJAX al servidor
        $.ajax({
            type: 'POST',
            url: 'editar_blog.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Verifica si la respuesta contiene "Éxito"
                if (response.includes("Éxito")) {
                    mostrarMensajeExito(response);
                    // Refresca la ventana del navegador después de mostrar el mensaje
                    location.reload();
                } else {
                    mostrarMensajeError('Error al actualizar el blog.');
                }
            },
            error: function() {
                // Muestra un mensaje de error si la solicitud falla
                mostrarMensajeError('Error al actualizar el blog.');
            }
        });
    });

    // Función para mostrar un mensaje de éxito
    function mostrarMensajeExito(mensaje) {
        alert(mensaje);
    }

    // Función para mostrar un mensaje de error
    function mostrarMensajeError(mensaje) {
        alert(mensaje);
    }
});
</script>
