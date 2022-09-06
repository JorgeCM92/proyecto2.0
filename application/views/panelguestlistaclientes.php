
<div class="container  col-md-12 right_col bg-gradient-secondary text-gray-100 ">
    <div class="row">
        <div class=" ">

        <h1 class="text-gray-100">LISTA DE CLIENTES</h1>
        <h1 class="text-gray-100">Panel de Invitados</h1>

        <?php 
        echo form_open_multipart('cliente/agregar');
        ?>
        <button type="submit" class="btn btn-primary" name="enviar">Agregar Cliente</button>
        <?php   
        echo form_close();
        ?>
        <br>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Nombres</th>
      <th scope="col">Primer Apellido</th>
      <th scope="col">Segundo Apellido</th>
      <th scope="col">Cedula Identidad</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Telefono</th>
      <th scope="col">Correo Electronico</th>
      <th scope="col">Direccion</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $indice=1;
    foreach ($clientes->result() as $row)
    {
        ?>

        <tr>
                <th scope="row"><?php echo $indice; ?></th>
                <td><?php echo $row->nombres; ?></td>
                <td><?php echo $row->primerApellido; ?></td>
                <td><?php echo $row->segundoApellido; ?></td>
                <td><?php echo $row->cedulaIdentidad; ?></td>
                <td><?php echo formatearFecha($row->fechaNacimiento); ?></td>
                <td><?php echo $row->telefono; ?></td>
                <td><?php echo $row->correoElectronico; ?></td>
                <td><?php echo $row->direccion; ?></td>

        </tr>
      <?php
      $indice++;
        
    }
    ?>

  </tbody>
</table>
        </div>

    </div>
</div>