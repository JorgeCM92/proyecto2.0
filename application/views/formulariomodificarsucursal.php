
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Sucursal</h2>
        
        <?php 
        foreach($infosucursal->result() as $row)
        {
        echo form_open_multipart('sucursal/modificarbd'); ?>
        <input type="hidden" name="idsucursal" value="<?php echo $row->idSucursal; ?>">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputN" class="form-label">Nombre Sucursal:</label>
                <input type="text" name="nombresucursal" class="form-control" placeholder="Ingrese el nombre de la sucursal" aria-label="First name" required value="<?php echo $row->nombreSucursal; ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control" id="inputAddress2" placeholder="Ingrese la direccion de su domicilio" required value="<?php echo $row->direccion; ?>">
            </div><br> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modificar Sucursal</button>
            </div>
            <br>
            
        </form>
        <?php 
        echo form_close();
        }
        ?>            
        </div>

    </div>
</div>