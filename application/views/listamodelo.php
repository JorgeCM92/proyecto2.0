
<div class="container  col-md-12 right_col bg-gradient-secondary text-gray-100 ">
    <div class="row">
        <div class=" ">

        <h1 class="text-gray-100">LISTA DE LOS MODELOS</h1>
        <?php echo form_open_multipart('modelo/listapdf'); ?>
        <button type="submit" class="btn btn-success" name="enviar">REPORTE PDF</button>
        <?php echo form_close(); ?>
        <br>

        <?php echo form_open_multipart('modelo/deshabilitados');?>
        <button type="submit" class="btn btn-warning" name="deshabilitados">VER MODELOS DESHABILITADOS</button>
        <?php echo form_close();?>
        <br>

        <?php 
        echo form_open_multipart('modelo/agregar');
        ?>
        <button type="submit" class="btn btn-primary" name="enviar">Agregar Modelo</button>
        <?php   
        echo form_close();
        ?>
        <br>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Modelo</th>
      <th scope="col">Modificar</th>
      <th scope="col">Eliminar</th>


    </tr>
  </thead>
  <tbody>
    <?php
    $indice=1;
    foreach ($modelos->result() as $row)
    {
        ?>

        <tr>
                <th scope="row"><?php echo $indice; ?></th>
                <td><?php echo $row->nombreModelo; ?></td>
                

                <td>
                  <?php echo form_open_multipart('modelo/modificar'); ?>
                  <input type="hidden" name="idmodelo" value="<?php echo $row->idModelo; ?>">
                  <button type="submit" class="btn btn-success">MODIFICAR</button>
                  <?php echo form_close(); ?>
                </td>
                


                <td>
                  <?php echo form_open_multipart('modelo/deshabilitarbd'); ?>
                  <input type="hidden" name="idmodelo" value="<?php echo $row->idModelo; ?>">
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