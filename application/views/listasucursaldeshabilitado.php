
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h1>Lista de sucursales deshabilitadas</h1>
        
        <?php echo form_open_multipart('sucursal/index');?>
        <button type="submit" class="btn btn-primary" >VER SUCURSALES HABILITADOS</button>
        <?php echo form_close();?>
        <br>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Nombre Sucursal</th>
      <th scope="col">Direccion</th>
      <th scope="col">Habilitar</th>

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
                  <?php echo form_open_multipart('sucursal/habilitarbd'); ?>
                  <input type="hidden" name="idsucursal" value="<?php echo $row->idSucursal; ?>">
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