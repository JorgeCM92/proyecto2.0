
<div class="container text-gray-100">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Modelo</h2>
        
        <?php 
        foreach($infomodelo->result() as $row)
        {
        echo form_open_multipart('modelo/modificarbd'); ?>
        <input type="hidden" name="idmodelo" value="<?php echo $row->idModelo; ?>">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputN" class="form-label">Nombre Modelo:</label>
                <input type="text" name="nombremodelo" class="form-control" placeholder="Ingrese el nombre del modelo" aria-label="First name" required value="<?php echo $row->nombreModelo; ?>">
            </div><br> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Modificar Modelo</button>
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