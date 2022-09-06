<div class="container  col-md-12 right_col bg-gradient-secondary text-gray-100 ">
    <div class="row">
        <div class="col-md-12">

        <h1>Lista de usuarios deshabilitados</h1>
        
        <?php echo form_open_multipart('usuarios/index2');?>
        <button type="submit" class="btn btn-primary" >VER USUARIOS HABILITADOS</button>
        <?php echo form_close();?>
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
      <th scope="col">Habilitar</th>

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
                  <?php echo form_open_multipart('usuarios/habilitarbd'); ?>
                  <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
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