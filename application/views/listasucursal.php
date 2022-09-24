
<div class="container  col-md-12 right_col bg-gradient-secondary text-gray-100 ">
    <div class="row">
        <div class=" ">

        <h1 class="text-gray-100">LISTA DE SUCURSALES</h1>
        <?php echo form_open_multipart('sucursal/listapdf'); ?>
        <button type="submit" class="btn btn-success" name="enviar">REPORTE PDF</button>
        <?php echo form_close(); ?>
        <br>

        <?php 
        echo form_open_multipart('sucursal/agregar');
        ?>
        <button type="submit" class="btn btn-primary" name="enviar">Agregar Sucursal</button>
        <?php   
        echo form_close();
        ?>
        <br>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Sucursal</th>
      <th scope="col">Direccion</th>
      <th scope="col">Modificar</th>
      <th scope="col">Eliminar</th>


    </tr>
  </thead>
  <tbody>
    <?php
    $indice=1;
    foreach ($sucursales->result() as $row)
    {
        ?>

        <tr>
                <th scope="row"><?php echo $indice; ?></th>
                <td><?php echo $row->nombreSucursal; ?></td>
                <td><?php echo $row->direccion; ?></td>
                

                <td>
                  <?php echo form_open_multipart('sucursal/modificar'); ?>
                  <input type="hidden" name="idsucursal" value="<?php echo $row->idSucursal; ?>">
                  <button type="submit" class="btn btn-success">MODIFICAR</button>
                  <?php echo form_close(); ?>
                </td>
                


                <td>
                  <?php echo form_open_multipart('sucursal/deshabilitarbd'); ?>
                  <input type="hidden" name="idsucursal" value="<?php echo $row->idSucursal; ?>">
                  <button type="submit" class="btn btn-danger" value="DESHABILITAR">ELIMINAR</button>
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