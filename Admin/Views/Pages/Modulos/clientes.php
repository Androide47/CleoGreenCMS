<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CMS Advisor Control Panel
        <small>Clientes</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Panel de clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      <div class="container">
    <h2>Clientes</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre Cliente</th>
                <th>Imagen Cliente</th>
                <th>Servicio Contratado</th>
                <th>Descripción del Servicio</th>
                <th>URL Cliente</th>
                <th>Estatus Cliente</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $conexion = Conexion::conectar(); // Configura tu conexión a la base de datos.

                $query = $conexion->prepare("SELECT * FROM Clientes"); // Realiza una consulta SQL para obtener datos de la tabla Clientes.
                $query->execute();

                while ($cliente = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $cliente['idCliente'] . '</td>';
                    echo '<td>' . $cliente['nombreCliente'] . '</td>';
                    echo '<td><img src="' . $cliente['imagenCliente'] . '" alt="Imagen del Cliente" width="100"></td>';
                    echo '<td>' . $cliente['servicioContratado'] . '</td>';
                    echo '<td>' . $cliente['descripcionServicio'] . '</td>';
                    echo '<td><a href="' . $cliente['urlCliente'] . '" target="_blank">Ver Cliente</a></td>';
                    echo '<td>' . $cliente['estatusCliente'] . '</td>';
                    echo '</tr>';
                }

            } catch (PDOException $ex) {
                // Maneja cualquier excepción de la base de datos aquí.
                echo 'Error al obtener los datos de clientes.';
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