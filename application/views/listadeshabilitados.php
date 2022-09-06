
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h1>Lista de clientes deshabilitados</h1>
        
        <?php echo form_open_multipart('cliente/index');?>
        <button type="submit" class="btn btn-primary" >VER CLIENTES HABILITADOS</button>
        <?php echo form_close();?>
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
      <th scope="col">Habilitar</th>

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

                <td>
                  <?php echo form_open_multipart('cliente/habilitarbd'); ?>
                  <input type="hidden" name="idcliente" value="<?php echo $row->idCliente; ?>">
                  <button type="submit" class="btn btn-warning" value="HABILITAR">HABILITAR</button>
                  <?php echo form_close(); ?>
                </td>

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