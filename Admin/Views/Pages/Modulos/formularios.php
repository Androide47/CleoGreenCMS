  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CMS Advisor Control Panel
        <small>Formularios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel de formularios</li>
      </ol>
    </section>

    <!-- Main content -->
    <!-- mostrar_newsletter.view.php -->

<div class="container mt-5">
    <h2>Formularios de contacto</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Asunto</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL para obtener datos de la tabla Newsletter
            // Ajusta la consulta según las columnas necesarias.
            try {
                $conexion = Conexion::conectar(); // Configura tu conexión a la base de datos.

                $query = $conexion->prepare("SELECT * FROM Contacto_Usuarios");
                $query->execute();

                while ($suscriptor = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $suscriptor['nombre'] . '</td>';
                    echo '<td>' . $suscriptor['correo'] . '</td>';
                    echo '<td>' . $suscriptor['asunto'] . '</td>';
                    echo '<td>' . $suscriptor['mensaje'] . '</td>';
                    echo '</tr>';
                }

            } catch (PDOException $ex) {
                echo 'Error al obtener los suscriptores.';
            }
            ?>
        </tbody>
    </table>
</div>

    <!-- /.content -->
  </div>