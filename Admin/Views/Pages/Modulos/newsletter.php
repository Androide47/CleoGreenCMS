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

                     <h2>Editar Correo</h2>
    <form action="enviar_correo_masivo.php" method="post">
        <div class="form-group">
            <label for="tituloBlog">Título asunto correo:</label>
            <input type="text" class="form-control" id="asuntoCorreo" name="asuntoCorreo">
        </div>

        <textarea id="editor1" name="contenidoCorreo" rows="10" cols="80"></textarea>
        <button type="submit" class="btn btn-primary">Enviar Correo Masivo</button>
    </form>

                        <br>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    CKEDITOR.replace('editor1');
</script>