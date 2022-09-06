<div class="container  col-md-12 right_col bg-gradient-secondary text-gray-100 ">
    <div class="row">
        <div class=" ">

        <h1 class="text-gray-100">LISTA DE USUARIOS</h1>

        <br>
        <?php echo form_open_multipart('usuarios/deshabilitados');?>
        <button type="submit" class="btn btn-warning" name="deshabilitados">VER USUARIOS DESHABILITADOS</button>
        <?php echo form_close();?>
        <br>

        <?php 
        echo form_open_multipart('usuarios/agregar');
        ?>
        <button type="submit" class="btn btn-primary" name="enviar">Agregar Usuario</button>
        <?php   
        echo form_close();
        ?>
        <br>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Foto</th>
      <th scope="col">Nombre Usuario</th>
      <th scope="col">Rol Usuario</th>
      <th scope="col">Nombre Completo</th>
      <th scope="col">Cedula Identidad</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Telefono</th>
      <th scope="col">Correo Electronico</th>
      <th scope="col">Direccion</th>
      <th scope="col">Modificar</th>
      <th scope="col">Eliminar</th>
      <th scope="col">Deshabilitar</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $indice=1;
    foreach ($usuario->result() as $row)
    {
        ?>

        <tr>
                <th scope="row"><?php echo $indice; ?></th>
                <td>
                    <?php 
                    $foto=$row->foto;
                    if($foto=="")
                    {
                        ?>
                        <img src="<?php echo base_url(); ?>/uploads/user.jpg" width="50px">
                        <?php    
                    }
                    else
                    {
                        ?>
                        <img src="<?php echo base_url(); ?>/uploads/<?php echo $foto; ?>" width="50px">
                        <?php
                    }
                    ?>
                </td>
                <td><?php echo $row->login; ?></td>
                <td><?php echo $row->tipo; ?></td>
                <td><?php echo ($row->nombres.' '.$row->primerApellido.' '.$row->segundoApellido); ?></td>
                <td><?php echo $row->cedulaIdentidad; ?></td>
                <td><?php echo formatearFecha($row->fechaNacimiento); ?></td>
                <td><?php echo $row->telefono; ?></td>
                <td><?php echo $row->correoElectronico; ?></td>
                <td><?php echo $row->direccion; ?></td>
                

                <td>
                  <?php echo form_open_multipart('usuarios/modificar'); ?>
                  <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                  <button type="submit" class="btn btn-success">MODIFICAR</button>
                  <?php echo form_close(); ?>
                </td>
                
                <td>
                  <?php echo form_open_multipart('usuarios/eliminarbd'); ?>
                  <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                  <button type="submit" class="btn btn-danger">ELIMINAR</button>
                  <?php echo form_close(); ?>
                </td>

                <td>
                  <?php echo form_open_multipart('usuarios/deshabilitarbd'); ?>
                  <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                  <button type="submit" class="btn btn-warning" value="DESHABILITAR">DESHABILITAR</button>
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