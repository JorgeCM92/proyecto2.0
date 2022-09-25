
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Marca</h2>
        
        <?php 
        foreach($infomarca->result() as $row)
        {
        echo form_open_multipart('marca/modificarbd'); ?>
        <input type="hidden" name="idmarca" value="<?php echo $row->idMarca; ?>">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputN" class="form-label">Nombre Marca:</label>
                <input type="text" name="nombremarca" class="form-control" placeholder="Ingrese el nombre de la marca" aria-label="First name" required value="<?php echo $row->nombreMarca; ?>">
            </div><br> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modificar Marca</button>
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