
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h1>Lista de marcas deshabilitadas</h1>
        
        <?php echo form_open_multipart('marca/index');?>
        <button type="submit" class="btn btn-primary" >VER MARCAS HABILITADOS</button>
        <?php echo form_close();?>
        <br>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">Nombre Marca</th>
      <th scope="col">Habilitar</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $indice=1;
    foreach ($marcas->result() as $row)
    {
        ?>

        <tr>
                <th scope="row"><?php echo $indice; ?></th>
                <td><?php echo $row->nombreMarca; ?></td>

                <td>
                  <?php echo form_open_multipart('marca/habilitarbd'); ?>
                  <input type="hidden" name="idmarca" value="<?php echo $row->idMarca; ?>">
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