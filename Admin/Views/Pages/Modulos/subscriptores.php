
    
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CMS Advisor Control Panel
        <small>Subscriptores</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Subscriptores</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        

      <!-- mostrar_newsletter.view.php -->

<div class="container mt-5">
    <h2>Suscriptores del Newsletter</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Suscriptor</th>
                <th>Nombre del Suscriptor</th>
                <th>Correo del Suscriptor</th>
                <th>Fecha de Suscripción</th>
                <th>Estatus de Suscripción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL para obtener datos de la tabla Newsletter
            // Ajusta la consulta según las columnas necesarias.
            try {
                $conexion = Conexion::conectar(); // Configura tu conexión a la base de datos.

                $query = $conexion->prepare("SELECT * FROM Newsletter");
                $query->execute();

                while ($suscriptor = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $suscriptor['idSuscriptor'] . '</td>';
                    echo '<td>' . $suscriptor['nombreSuscriptor'] . '</td>';
                    echo '<td>' . $suscriptor['correoSuscriptor'] . '</td>';
                    echo '<td>' . $suscriptor['fechaSuscripcion'] . '</td>';
                    echo '<td>' . $suscriptor['estatusSuscripcion'] . '</td>';
                    echo '</tr>';
                }

            } catch (PDOException $ex) {
                echo 'Error al obtener los suscriptores.';
            }
            ?>
        </tbody>
    </table>
</div>



        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>