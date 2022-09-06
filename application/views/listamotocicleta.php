
<div class="container  col-md-12 right_col bg-gradient-secondary text-gray-100" >
    <div class="row bg-gradient-secondary">
        <div class=" ">

        <h1 class="text-gray-100">LISTA DE MOTOCICLETAS</h1>

        <?php echo form_open_multipart('motocicleta/listapdf'); ?>
        <button type="submit" class="btn btn-success" name="enviar">REPORTE PDF</button>
        <?php echo form_close(); ?>
        <br>
        <?php echo form_open_multipart('motocicleta/deshabilitados');?>
        <button type="submit" class="btn btn-warning" name="deshabilitados">VER MOTOCICLETAS DESHABILITADAS</button>
        <?php echo form_close();?>
        <br>

        <?php 
        echo form_open_multipart('motocicleta/agregar');
        ?>
        <button type="submit" class="btn btn-primary" name="enviar">Agregar Motocicleta</button>
        <?php   
        echo form_close();
        ?>
        <br>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Marca</th>
      <th scope="col">Tipo de Modelo</th>
      <th scope="col">Color</th>
      <th scope="col">Año Modelo</th>
      <th scope="col">Nro. Chasis</th>
      <th scope="col">Nro. Motor</th>
      <th scope="col">Poliza</th>
      <th scope="col">Fecha Registro</th>
      <th scope="col">Modificar</th>
      <th scope="col">Eliminar</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $indice=1;
    foreach ($motocicletas->result() as $row)
    {
        ?>

        <tr>
                <th scope="row"><?php echo $indice; ?></th>
                <td><?php echo $row->marca; ?></td>
                <td><?php echo $row->tipoModelo; ?></td>
                <td><?php echo $row->color; ?></td>
                <td><?php echo $row->anioModelo; ?></td>
                <td><?php echo $row->nroChasis; ?></td>
                <td><?php echo $row->nroMotor; ?></td>
                <td><?php echo $row->poliza; ?></td>
                <td><?php echo formatearFechaHora($row->fechaRegistro); ?></td>
                

                <td>
                  <?php echo form_open_multipart('motocicleta/modificar'); ?>
                  <input type="hidden" name="idmotocicleta" value="<?php echo $row->idMotocicleta; ?>">
                  <button type="submit" class="btn btn-success">MODIFICAR</button>
                  <?php echo form_close(); ?>
                </td>

                <td>
                  <?php echo form_open_multipart('motocicleta/deshabilitarbd'); ?>
                  <input type="hidden" name="idmotocicleta" value="<?php echo $row->idMotocicleta; ?>">
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